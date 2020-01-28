<?php

namespace controller;
use model\traducteur;
use model\offre;
use model\devis;
use model\langue;
use model\traduction;
use model\type_traduction;
use model\demandeTraduction;
use model\signalementTraducteur;


class Traducteurcontroleur extends \core\Controller\controller {


	
    public function downloadDevis($devis_id){
		$devis = new devis();
		$devis_info = $devis->listec(array("id" => $devis_id))[0];
		$filepath = $devis_info['file_path'];
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
    public function downloadTraduction($devis_id){
        $traduction = new traduction();
        $traductionRow = $traduction->listec(array("devis_id" => $devis_id,"traducteur_id" => $_SESSION['id']));
        $filepath = $traductionRow[0]['file_path'];
        $traducteur = new traducteur();
        $filename = "Traduction_Devis_".$devis_id.".pdf";
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
    

	public function rendreTraduction()
	{ 
		if(isset($_POST) && !empty($_POST))
		{
            //Insertion du traduction dans la base de donnée
			$traduction = new traduction();
			$array['traducteur_id']=$_SESSION['id'];
			$array['devis_id']=$_POST['devis_id'];
			$dest = "aa";
            $traduction->ajouter($array);
            //uploader le fichier traduit
            if (isset($_FILES['document']) AND $_FILES['document']['error']== 0)
            {
                $infosfichier = pathinfo($_FILES['document']['name']);
                $extension = $infosfichier['extension'];
                $dest = 'TraductionDocuments/'.$array['devis_id'].'_'.$_SESSION['id'].'.'.$extension ;
                move_uploaded_file($_FILES['document']['tmp_name'],$dest);
            }
			//Inserer le chemin du fichier dans la table 
            $traduction->update(array('file_path' => $dest),$array);    
        }
		$this->home();
	}

	public function ajouterOffre()
	{
		/*
            inserer une offre 
		*/
		$offre = new offre();
		$array['traducteur_id']=$_SESSION['id'];
		$array['devis_id']=$_POST['devis_id'];
		$array['prix']=$_POST['prix'];
		$offre->ajouter($array);
		$this->home();
    }
    
    public function editProfile()
    {
        if(isset($_POST) and !empty($_POST))
        {
            $traducteur = new traducteur();
            unset($_POST['rpassword']);
            if(empty($_POST['password']))    unset($_POST['password']);
            $traducteur->update($_POST,array("id" => $_SESSION['id']));
        }
        $this->profile($_SESSION['id']);
    }


    public function liste()
	{
		$traducteur = new traducteur();
		$liste = $traducteur->liste();
		//$liste : tableau d'objets  $liste = $data ;
		$this->render('traducteur/profiles',$liste);
    }
    
    
    public function signaler()
    {
        $signalement = new signalementTraducteur();
        $_POST['traducteur_id'] = $_SESSION['id'];
        $signalement->ajouter($_POST);        
        $this->home('traducteur/home');
    }


	public function profile($id)
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
        $this->render('traducteur/profile',$data);
    }

    public function signup()
    {   
        $langue = new langue();
        $langues = $langue->getAll();
        $data['langues'] = $langues;   

		if(isset($_POST) && !empty($_POST))
		{
			$user = new traducteur();
			//Verifier qu'aucun compte exist avec le méme email
		    $res = $user->listec(array('email'=>$_POST['email']));
		    if($res)
		    {
				$data['error'] = 'Email existe déja ';
                $this->render('traducteur/recrutement',$data);
            }
            //Ajouter CV
            if (isset($_FILES['cv']) AND $_FILES['cv']['error']== 0)
            {
                $infosfichier = pathinfo($_FILES['cv']['name']);
                $extension = $infosfichier['extension'];
                if ($extension !== 'pdf')	// Testons si l'extension est autorisée
                {
                    $data['error']= "Extension CV n'est pas PDF";
                    $this->render('traducteur/recrutement',$data);
                }
            }
            else 
            {
                $data['error']= "Le fichier CV manque";
                $this->render('traducteur/recrutement',$data);             
            }
            
            if (isset($_FILES['referenceFiles']) AND $_FILES['referenceFiles']['error']== 0)
            {
                $total = count($_FILES['referenceFiles']['name']);
                for( $i=1 ; $i < $total ; $i++ ) {
                $tmpFilePath = $_FILES['referenceFiles']['tmp_name'][$i];
                if ($tmpFilePath != ""){
                $extension = $_FILES['referenceFiles']['extension'][$i];
                    if ($extension !== 'pdf')	// Testons si l'extension est autorisée
                    {
                        $data['error']= "Extension Reference File n'est pas PDF";
                        $this->render('traducteur/recrutement',$data);
                    }
                }
                }
            }
            if(isset($_POST['assermente']))
            {
                $_POST['assermente'] = 1;
                if (isset($_FILES['assermenteFile']) AND $_FILES['assermenteFile']['error']== 0)
                {
                    $infosfichier = pathinfo($_FILES['assermenteFile']['name']);
                    $extension = $infosfichier['extension'];
                    if ($extension !== 'pdf')	// Testons si l'extension est autorisée
                    {
                        $data['error']= "Extension du fichier prouvons Votre assermentation n'est pas PDF";
                        $this->render('traducteur/recrutement',$data);
                    }
                }
                else 
                {
                    $data['error']= "Le fichier prouvons Votre assermentation est manquant";
                    $this->render('traducteur/recrutement',$data);             
                }
            }
            if(isset($_POST['langues']))
            {
                if(isset($_POST['langues'][0])) $_POST['langue1'] = $_POST['langues'][0];
                if(isset($_POST['langues'][1])) $_POST['langue2'] = $_POST['langues'][1];
                if(isset($_POST['langues'][2])) $_POST['langue3'] = $_POST['langues'][2];
                if(isset($_POST['langues'][3])) $_POST['langue4'] = $_POST['langues'][3];
                if(isset($_POST['langues'][4])) $_POST['langue5'] = $_POST['langues'][4];
            }
            unset($_POST['rpassword']);
            unset($_POST['referenceFiles']);
            unset($_POST['assermenteFile']);
            unset($_POST['cv']);
            unset($_POST['langues']);


			$data = $user->ajouter($_POST);
			$_SESSION['id'] = $data['id'];
			$_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['password'] = $data['password'];
			$_SESSION['telephone'] = $data['tel'];
			$_SESSION['fax'] = $data['fax'];
			$_SESSION['wilaya'] = $data['wilaya'];
			$_SESSION['commune'] = $data['commune'];
			$_SESSION['adresse'] = $data['adress'];
            $_SESSION['type'] = "traducteur";
            $dossier = @opendir('Traducteurs/'.$_SESSION['id']);
            if(!$dossier)										//Si le dossier n'exist pas
            {
                mkdir ('Traducteurs/'.$_SESSION['id'] ,0777 ,true);
            }
            //ajouter le cv , references , tofs
            $dest = 'Traducteurs/'.$_SESSION['id'].'/CV.'.$extension ;
            move_uploaded_file($_FILES['cv']['tmp_name'],$dest);
            if(isset($_POST['assermente']))
            {
                $dest = 'Traducteurs/'.$_SESSION['id'].'/assermente.'.$extension ;
                move_uploaded_file($_FILES['assermenteFile']['tmp_name'],$dest);
            }
            if(isset($total))
            {
                for( $i=1 ; $i < $total ; $i++ ){
                    $dest = 'Traducteurs/'.$_SESSION['id'].'/reference'.$i.'.'.$extension ;
                    move_uploaded_file($_FILES['referenceFiles']['tmp_name'][$i],$dest);
                }
            }
			$this->home();
	    }
	    else
	    {
			$this->render('traducteur/recrutement',$data);;
	    }

    }

}
