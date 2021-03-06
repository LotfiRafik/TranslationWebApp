<?php
namespace controller\admin;
use model\client;
use model\traducteur;
use model\devis;
use model\offre;
use model\traduction;
use model\devisTraducteur;
use model\demandeTraduction;
use model\signalementClient;
use model\signalementTraducteur;
use model\type_traduction;



class Admincontroleur extends controller {



    public function statistique()
    {
        $this->render('statistiques');
    }
    
    public function nbTraduction()
    {
        $traduction = new traduction();
        $data = false;
        $data = $traduction->stats($_POST['date1'],$_POST['date2']);
        echo json_encode($data);
    }







    public function gestionTraducteur()
    {
        //recuperer liste des traducteurs
        $traducteur = new traducteur();
        $data['traducteurs'] = $traducteur->liste();
        //afficher la page 
        $this->render('gestionTraducteur',$data);
    }

    public function gestionClient()
    {
        //recuperer liste des clients
        $client = new client();
        $data['clients'] = $client->liste();
        //afficher la page 
        $this->render('gestionClient',$data);
    }

    public function gestionDocument()
    {
        //recuperer liste des devis
        $devis = new devis();
        $traducteur = new traducteur();
        $devisTraducteur = new devisTraducteur();
        $demandeTraduction = new demandeTraduction();
        $traduction = new traduction();
        $client = new client();

        $data['devis'] = $devis->getAll();
        $j = 0;
        foreach ($data['devis'] as $devis) 
        {
            $listTraducteurId = $devisTraducteur->getAll($devis['id']);
            $data['devis'][$j]['clientInfo'] = $client->listec(array("id" => $devis['client_id']));
            $data['devis'][$j]['traducteursInfo'] = false;
            if($listTraducteurId)
            {
                $i = 0;
                foreach ($listTraducteurId as $traducteurId)
                {
                    $data['devis'][$j]['demandeTraduction'][$i] = $demandeTraduction->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']))[0];
                    $data['devis'][$j]['traduction'][$i] = $traduction->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']))[0];
                    $data['devis'][$j]['traducteursInfo'][$i] = $traducteur->listec(array("id" => $traducteurId['traducteur_id']));
                    $i++;
                }
            }
            $j++;
        }
        //afficher la page 
        $this->render('gestionDocument',$data);
    }


    public function deleteTransaction($devis_id,$traducteur_id)
    {
        $devis = new devis();        
        $offre = new offre();
        $traduction = new traduction();
        $demandeTraduction = new demandeTraduction();
        $devisTraducteur = new devisTraducteur();
        //traduction
        $traduction->delete(array("devis_id" => $devis_id,"traducteur_id" => $traducteur_id));
        //demande_trad
        $demandeTraduction->delete(array("devis_id" => $devis_id,"traducteur_id" => $traducteur_id));
        //offre
        $offre->delete(array("devis_id" => $devis_id,"traducteur_id" => $traducteur_id));
        //devis_trad
        $devisTraducteur->delete(array("devis_id" => $devis_id,"traducteur_id" => $traducteur_id));
        
        $this->gestionDocument();
    }
        
    public function editTraducteur()
    {
        if(isset($_POST) and !empty($_POST))
        {
            $traducteur = new traducteur();
            unset($_POST['rpassword']);
            if(empty($_POST['password']))    unset($_POST['password']);
            $traducteur->update($_POST,array("id" => $_POST['id']));
        }
        $this->gestionTraducteur();
    }


    public function bloquerTraducteur()
    {
        $traducteur = new traducteur();
        $array['idbloquer'] = $_SESSION['id'];
        $traducteur->update($array,array("id" => $_GET['id']));    
        $this->gestionTraducteur();
    }

    public function debloquerTraducteur()
    {
        $traducteur = new traducteur();
        $array['idbloquer'] = null;
        $traducteur->update($array,array("id" => $_GET['id']));    
        $this->gestionTraducteur();
    }


    public function traducteurProfile($id)
	{
        $i = 0;
        $traducteur = new traducteur();
        $traduction = new traduction();
        $demandeTraduction = new demandeTraduction();
        $type_traduction = new type_traduction();
        $devis = new devis();
        $offre = new offre();
        $data['nbdemande'] = $demandeTraduction->listec(array("traducteur_id" => $id));
        if(!$data['nbdemande']) $data['nbdemande'] = 0;
        else $data['nbdemande'] = count($data['nbdemande']);
        $data['moynote'] = intval($traduction->moyNotes($id)['moynote']);
        $data['infos'] = $traducteur->listec(array("id" => $id))[0];
        $data['traductions'] = $traduction->listec(array("traducteur_id" => $id));
        if(!$data['traductions']) $data['nb_traduction'] = 0;
        else $data['nb_traduction'] = count($data['traductions']);
        if($data['traductions'])
        {
            foreach ($data['traductions'] as $traduction) {
                $data['traductions'][$i]['devis'] = $devis->listec(array("id" => $traduction['devis_id']))[0];
                $data['traductions'][$i]['prix'] = $offre->listec(array("devis_id" => $traduction['devis_id'],"traducteur_id" => $id))[0]['prix'];
                $typeId = $data['traductions'][$i]['devis']['traduction_type'];
                $data['traductions'][$i]['type'] = $type_traduction->listec(array("id" => $typeId))[0]['description'];
                $i++;
            }
        }
        $data2 = $this->historiqueTraducteur($id);
        $data = array_merge($data,$data2);
        $this->render('traducteurProfile',$data);
    
    }

    private function historiqueTraducteur($id)
    {
       $devis = new devis();
       $offre = new offre();
       $client = new client();
       $traduction = new traduction();
       $demandeTraduction = new demandeTraduction();
       $devisTraducteur = new devisTraducteur();
       $traducteur = new traducteur();
       $signalement = new signalementTraducteur();
       $signalementClient = new signalementClient();

          $i=0;
          $listDevis = false;
          $listDevisTrad = $devisTraducteur->listec(array("traducteur_id" => $id));
          if($listDevisTrad)
          {
            foreach ($listDevisTrad as $devisTrad)
            {
              $devisInfo = $devis->listec(array("id" => $devisTrad['devis_id']));
              $clientInfo = $client->listec(array("id" => $devisInfo[0]['client_id']));
              $offreInfo = $offre->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $id));
              $demandeTradInfo = $demandeTraduction->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $id));
              $traductionInfo = $traduction->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $id));
              $signalementInfo = $signalement->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $id));
              $signalementClientInfo = $signalementClient->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $id));
              $listDevis[$i] = $devisInfo[0];
              $listDevis[$i]['client'] = $clientInfo[0];
              $listDevis[$i]['offre'] = $offreInfo[0];
              $listDevis[$i]['demandeTrad'] = $demandeTradInfo[0];
              $listDevis[$i]['traduction'] = $traductionInfo[0];
              $listDevis[$i]['signalement'] = $signalementInfo[0];
              $listDevis[$i]['signalementClient'] = $signalementClientInfo[0];
              $i++;
            }
          }
          $data['listDevis'] = $listDevis;
          return $data;
    }



    //GESTION CLIENT

        
    public function editClient()
    {
        if(isset($_POST) and !empty($_POST))
        {
            $client = new client();
            unset($_POST['rpassword']);
            if(empty($_POST['password']))    unset($_POST['password']);
            $client->update($_POST,array("id" => $_POST['id']));
        }
        $this->gestionClient();
    }


    public function bloquerClient()
    {
        $client = new client();
        $array['idbloquer'] = $_SESSION['id'];
        $client->update($array,array("id" => $_GET['id']));    
        $this->gestionClient();
    }

    public function debloquerClient()
    {
        $client = new client();
        $array['idbloquer'] = null;
        $client->update($array,array("id" => $_GET['id']));    
        $this->gestionClient();
    }

    
  public function clientProfile($id)
  {

     $devis = new devis();
     $offre = new offre();
     $traduction = new traduction();
     $demandeTraduction = new demandeTraduction();
     $devisTraducteur = new devisTraducteur();
     $traducteur = new traducteur();
     $client = new client();
        $i=0; $j=0;
        $data['clientInfo'] = $client->listec(array("id" => $id))[0];
        $listDevis = $devis->listec(array("client_id" => $id));
        if($listDevis)
        {
          foreach ($listDevis as $devis)
          {
            //retourner les traducteurs qui correspond aux critéres
            $list_traducteur_dispo = $traducteur->filterTraducteur($devis['langue_s'],$devis['langue_d'],$devis['assermente']);
            if(!$list_traducteur_dispo) $listDevis[$j]['nb_traducteurs_dispo'] = 0;
            else $listDevis[$j]['nb_traducteurs_dispo'] = count($list_traducteur_dispo);
            $listDevis[$j]['nb_offre']  = $offre->getNbOffre($devis['id'])['nb'];
            //retourner les traducteurs qu'on a envoyé une demande de traduction
            $listTraducteurId = $devisTraducteur->getAll($devis['id']);
            if($listTraducteurId)
            {
              foreach ($listTraducteurId as $traducteurId) {
                $traducteurInfo = $traducteur->listec(array("id" => $traducteurId['traducteur_id']));
                $offreInfo = $offre->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
                $traductionInfo = $traduction->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
                $listDevis[$j]['traducteurs'][$i] = $traducteurInfo[0];
                $listDevis[$j]['traducteurs'][$i]['offre'] = $offreInfo[0];
                $listDevis[$j]['traducteurs'][$i]['traduction'] = $traductionInfo[0];
                $i++;
              }
            }
            $j++;
          }
        }
        $data['listDevis'] = $listDevis;
        $this->render('clientProfile',$data);	
    }

    
    public function echoDevis($devis_id)
    {
        //Recuperer les infos du devis,traducteurs,offres
        $i=0;
        $devis = new devis();
		$type_traduction = new type_traduction();
        $devisTraducteur = new devisTraducteur();
        $demandeTraduction = new demandeTraduction();
        $signalement = new signalementClient();
        $signalementTraducteur = new signalementTraducteur();
        $traducteur = new traducteur();
        $offre = new offre();
        $traduction = new traduction();
        $devis = $devis->listec(array("id" => $devis_id))[0];
        $traduction_types = $type_traduction->listec(array("id" => $devis['traduction_type']))[0];
        $devis['traduction_type'] = $traduction_types['description'];
        $listTraducteurId = $devisTraducteur->getAll($devis_id);
        $devis['traducteurs'] = false;
        if($listTraducteurId)
        {
            foreach ($listTraducteurId as $traducteurId)
            {
                $demandeInfo = $demandeTraduction->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
                $traducteurInfo = $traducteur->listec(array("id" => $traducteurId['traducteur_id']));
                $offreInfo = $offre->listec(array("traducteur_id" => $traducteurId['traducteur_id'],"devis_id" => $devis_id));
                $traductionInfo = $traduction->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
                $signalementInfo = $signalement->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
                $signalementTraducteurInfo = $signalementTraducteur->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
                $devis['traducteurs'][$i] = $traducteurInfo[0];
                $devis['traducteurs'][$i]['demande'] = $demandeInfo[0];
                $devis['traducteurs'][$i]['offre'] = $offreInfo[0];
                $devis['traducteurs'][$i]['traduction'] = $traductionInfo[0];
                $devis['traducteurs'][$i]['signalement'] = $signalementInfo[0];
                $devis['traducteurs'][$i]['signalementTraducteur'] = $signalementInfo[0];
                $i++;
            }
        }
        $data['devis'] = $devis;
        $this->render('clientDevis',$data);		//page devis 

    }


    public function downloadDevis($devis_id){
        $devis = new devis();
        $filepath = $devis->listec(array("id" => $devis_id))[0]['file_path'];
        $filename = "Devis_".$devis_id.".pdf";
        if(file_exists($filepath))
        {
            ob_start();
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.$filename.''); //Nom du fichier
            ob_clean();
            readfile($filepath);
        }
        else
        {
            $this->render('error');
        }
    }
    public function downloadTraduction($devis_id,$traducteur_id){
        $traduction = new traduction();
        $traductionRow = $traduction->listec(array("devis_id" => $devis_id,"traducteur_id" => $traducteur_id));
        $filepath = $traductionRow[0]['file_path'];
        $traducteur = new traducteur();
        $traducteur_info = $traducteur->listec(array("id" => $traducteur_id))[0];
        $filename = "Traduction".$traducteur_info['lastname']."-".$traducteur_info['firstname'].".pdf";
        if(file_exists($filepath))
        {
            ob_start();
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.$filename.''); //Nom du fichier
            ob_clean();
            readfile($filepath);
        }
        else
        {
            $this->render('error');
        }
    }





}