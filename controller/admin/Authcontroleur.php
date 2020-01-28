<?php

namespace controller\admin;
use model\admin;


class Authcontroleur extends controller {


	public function connexion()
	{
		$error = null;
		if(!empty($_POST) AND isset($_POST))		//Si l'utilisateur a rempli les informations
		{
			$admin = new admin();
			$data = $admin->connexion(array('identifiant'=>$_POST['identifiant'],'password'=>$_POST['password']));
			if($data)					//Si les infos rempli sont juste
			{
				$_SESSION['id'] = $data['id'];
				$_SESSION['identifiant'] = $data['identifiant'];
				$_SESSION['password'] = $data['password'];
				$this->home();
			}
			else 					//sinon
			{
				$error['login'] = true;
			}
		}	
		$this->render('admin/connexion/connexion',null,$error);
	}




	public function signup()
	{
		$error = null;
		$langue = new langue();
		$type_traduction = new type_traduction();
		if(isset($_POST) && !empty($_POST))
		{
			$user = new client();
			//Verifier qu'aucun compte exist avec le méme email
			unset($_POST['rpassword']);
		    $data = $user->listec(array('email'=>$_POST['email']));
		    if($data)
		    {
				$error['signup'] = true;
				$traduction_types = $type_traduction->getTypeDispo();
				$langues = $langue->getAll();
				$data['langues'] = $langues;
				$data['traduction_types'] = $traduction_types;
				$this->render('initpage',$data,$error);;
		    }
			else 					//Sinon on ajoute le compte dans la table client
			{
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
				$_SESSION['type'] = "client";
				$this->home();
			}
	    }
	    else
	    {	
			$langue = new langue();
			$type_traduction = new type_traduction();
			$traduction_types = $type_traduction->getTypeDispo();
			$langues = $langue->getAll();
			$data['langues'] = $langues;
			$data['traduction_types'] = $traduction_types;
			$this->render('initpage',$data);;
	    }
	}

	 public function deconnexion()
	 {	
		session_destroy();
		$langue = new langue();
		$type_traduction = new type_traduction();
		$traduction_types = $type_traduction->getTypeDispo();
		$langues = $langue->getAll();
		$data['langues'] = $langues;
		$data['traduction_types'] = $traduction_types;
		$this->render('initpage',$data);
	 }



}
