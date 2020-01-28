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
use model\type_traduction;



class Admincontroleur extends controller {



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
        //recuperer liste des traducteurs
        $client = new client();
        $data['clients'] = $client->liste();
        //afficher la page 
        $this->render('gestionClient',$data);
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

    

}
