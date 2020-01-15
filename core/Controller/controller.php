<?php
namespace core\Controller;
use model\type_traduction;
use model\client;
use model\traducteur;
use model\devis;
use model\offre;
use model\traduction;
use model\devisTraducteur;
use model\demandeTraduction;

class  Controller {

  public function render($vue,$data=[],$error=[])
  {	
    ob_start();
    require 'view/'.$vue.'.php';
    $content = ob_get_clean();
    require 'view/template/index.php';
    exit(0);
  }

  public function home()
  {
   if(isset($_SESSION['type']))
   {
     $devis = new devis();
     $offre = new offre();
     $traduction = new traduction();
     $demandeTraduction = new demandeTraduction();
     $devisTraducteur = new devisTraducteur();
     $traducteur = new traducteur();
     $client = new client();
     
     switch($_SESSION['type'])
     {
       case 'client':
        $i=0; $j=0;
        $listDevis = $devis->listec(array("client_id" => $_SESSION['id']));
        foreach ($listDevis as $devis) {
          $listTraducteurId = $devisTraducteur->getAll($devis['id']);
          foreach ($listTraducteurId as $traducteurId) {
            $traducteurInfo = $traducteur->listec(array("id" => $traducteurId['traducteur_id']));
            $offreInfo = $offre->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
            $traductionInfo = $traduction->listec(array("devis_id" => $devis['id'],"traducteur_id" => $traducteurId['traducteur_id']));
            $listDevis[$j]['traducteurs'][$i] = $traducteurInfo[0];
            $listDevis[$j]['traducteurs'][$i]['offre'] = $offreInfo[0];
            $listDevis[$j]['traducteurs'][$i]['traduction'] = $traductionInfo[0];
            $i++;
          }
          $j++;
        }
        $data['listDevis'] = $listDevis;
        $this->render('client/home',$data);		//page d'acceuil des clients
       break;
       case 'traducteur':
        $i=0; $j=0;
        $listDevisTrad = $devisTraducteur->listec(array("traducteur_id" => $_SESSION['id']));
        foreach ($listDevisTrad as $devisTrad)
        {
          $devisInfo = $devis->listec(array("id" => $devisTrad['devis_id']));
          $clientInfo = $client->listec(array("id" => $devisInfo[0]['client_id']));
          $offreInfo = $offre->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $_SESSION['id']));
          $demandeTradInfo = $demandeTraduction->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $_SESSION['id']));
          $traductionInfo = $traduction->listec(array("devis_id" => $devisTrad['devis_id'],"traducteur_id" => $_SESSION['id']));
          $listDevis[$i] = $devisInfo[0];
          $listDevis[$i]['client'] = $clientInfo[0];
          $listDevis[$i]['offre'] = $offreInfo[0];
          $listDevis[$i]['demandeTrad'] = $demandeTradInfo[0];
          $listDevis[$j]['traduction'] = $traductionInfo[0];
          $i++;
        }
        $data['listDevis'] = $listDevis;
        $this->render('traducteur/home',$data);	//page d'acceuil des traducteurs
       break;	         
     }
   }
   else
   {
      $this->render('initpage');		//page d'acceuil des membres non authentifiés
   }
  }
  
}
