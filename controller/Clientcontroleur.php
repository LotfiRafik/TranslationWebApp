<?php
namespace controller;
use model\client;
use model\traducteur;
use model\devis;
use model\offre;
use model\traduction;
use model\devisTraducteur;
use model\demandeTraduction;
use model\signalementClient;
use model\type_traduction;



class Clientcontroleur extends \core\Controller\controller {


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
    
    public function noterTraduction()
    {
        $traduction = new traduction();
        $array1['note']=$_POST['note'];
        $array2['devis_id']=$_POST['devis_id'];
        $array2['traducteur_id']=$_POST['traducteur_id'];
        $traduction->update($array1,$array2);        
        $this->echoDevis($array2['devis_id']);
    }


    public function ajouterDemandeTrad()
    {
        $demandeTraduction = new demandeTraduction();
        $array['devis_id']=$_POST['devis_id'];
        $array['traducteur_id']=$_POST['traducteur_id'];
        $demandeTraduction->ajouter($array);        
        $this->home();
    }


    public function signaler()
    {
        $signalement = new signalementClient();
        $signalement->ajouter($_POST);        
        $this->echoDevis($_POST['devis_id']);
    }


    public function ajouterTraducteurDevis()
    {
        /*
            devis_id et les id des traducteurs selectionnés par le client 
            et les inserer dans la table devis_traducteur
        */
        $devisTraducteur = new devisTraducteur();
        $array['devis_id']=$_POST['devis_id'];
        foreach ($_POST['traducteursId'] as $tradId => $id) {
            $array['traducteur_id'] = $id;
            $devisTraducteur->ajouter($array);
        }
        $this->echoDevis($array['devis_id']);
    }


    public function demanderDevis()
    {
            if(isset($_POST) && !empty($_POST))
            {
                //Insertion du devis dans la base de donnée
                $devis = new devis();
                $_POST['client_id'] = $_SESSION['id'];
                $devis_id = $devis->ajouter($_POST);
                //uploader le fichier du devis
                if (isset($_FILES['document']) AND $_FILES['document']['error']== 0)
                {
                    $infosfichier = pathinfo($_FILES['document']['name']);
                    $extension = $infosfichier['extension'];
                    $dest = 'DevisDocuments/'.$devis_id.'.'.$extension ;
                    move_uploaded_file($_FILES['document']['tmp_name'],$dest);
                }
                //Inserer le chemin du fichier dans la table devis
                $devis->update(array('file_path' => $dest),array('id' => $devis_id));    
                //retourner les traducteurs qui correspond aux critéres
                $traducteur = new traducteur();
                if(!isset($_POST['assermente'])) $_POST['assermente'] = 0;
                $list_traducteur = $traducteur->filterTraducteur($_POST['langue_s'],$_POST['langue_d'],$_POST['assermente']);
                $devisArray['devis_id'] = $devis_id;
                $list['traducteurs'] = $list_traducteur;
                echo json_encode(array_merge($devisArray,$list));
            }
    }

    public function getTraducteurDispo()
    {
        $devis = new devis();
        $devisInfo = $devis->listec(array("id" => $_POST['devis_id']))[0];
        $traducteur = new traducteur();
        $list_traducteur_dispo = $traducteur->getTraducteurDispo($devisInfo['langue_s'],$devisInfo['langue_d'],$devisInfo['assermente'],$devisInfo['id']);
        echo json_encode($list_traducteur_dispo);
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
                $devis['traducteurs'][$i] = $traducteurInfo[0];
                $devis['traducteurs'][$i]['demande'] = $demandeInfo[0];
                $devis['traducteurs'][$i]['offre'] = $offreInfo[0];
                $devis['traducteurs'][$i]['traduction'] = $traductionInfo[0];
                $devis['traducteurs'][$i]['signalement'] = $signalementInfo[0];
                $i++;
            }
        }
        $data['devis'] = $devis;
        $this->render('client/devis',$data);		//page devis 

    }

}
