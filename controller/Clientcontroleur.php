<?php
namespace controller;
use model\client;
use model\traducteur;
use model\devis;

class Clientcontroleur extends \core\Controller\controller {

    public function demanderDevis()
    {
        
    }
    public function ajouterDevis()
    {

        if(isset($_POST) && !empty($_POST))
		{
            //Insertion du devis dans la base de donnée
            $devis = new devis();
            $_POST['client_id'] = $_SESSION['id'];
           /* $devis_id = $devis->ajouter($_POST);
            //uploader le fichier du devis
            if (isset($_FILES['document']) AND $_FILES['document']['error']== 0)
            {
                $infosfichier = pathinfo($_FILES['document']['name']);
                $extension = $infosfichier['extension'];
                $dest = 'DevisDocuments/'.$devis_id.'.'.$extension ;
                move_uploaded_file($_FILES['document']['tmp_name'],$dest);
            }
            //Inserer le chemin du fichier dans la table devis
            $devis->update(array('file_path' => $dest),$devis_id);    */
        }
        //retourner les traducteurs qui correspond aux critéres
        $traducteur = new traducteur();
        if(!isset($_POST['assermente'])) $_POST['assermente'] = 0;
        $list_traducteur = $traducteur->filterTraducteur($_POST['langue_s'],$_POST['langue_d'],$_POST['assermente']);

        echo json_encode($list_traducteur);

    }

}
