<?php

namespace controller;
use model\client;
use model\traducteur;


class Authcontroleur extends \core\Controller\controller {


	public function connexion()
	{
		if(!empty($_POST) AND isset($_POST))		//Si l'utilisateur a rempli les informations
		{
			switch($_POST['type'])
			{
				case 'client':
					$user = new client();
				break;
				case 'traducteur':
					$user = new traducteur();
				break;
				default :
				$this->render('error');		
			}
			$data = $user->connexion(array('email'=>$_POST['email'],'password'=>$_POST['password']));
			if($data)					//Si les infos rempli sont juste
			{
				$_SESSION['id'] = $data->id;
				$_SESSION['firstname'] = $data->firstname;
				$_SESSION['lastname'] = $data->lastname;
				$_SESSION['email'] = $data->email;
				$_SESSION['password'] = $data->password;
				$_SESSION['type'] = $_POST['type'];
				$this->home();
			}
			else 					//sinon
			{
				$error = true;
			}
		}
		$this->render('initpage');
	}




	public function signup()
	{
		if(!empty($_POST))
		{
			switch($_POST['type'])
			{
				case 'client':
					$user = new client();
				break;
				case 'traducteur':
					$user = new traducteur();
				break;
				default :
				$this->render('error');		
			}
			//Verifier qu'aucun compte exist avec le méme email
		    $data = $user->listec(array('email'=>$_POST['email']));
		    if($data)
		    {
				$sign_error['exist'] = 'exist';
		    }
			if(isset($sign_error))	
			{
				$this->render('initpage');;
			}
			else 					//Sinon on ajoute le compte dans la table client/traducteur
			{
				$data = $user->ajouter(array('email'=>$_POST['email'],'password'=>$_POST['password']));
				$_SESSION['id'] = $data->id;
				$_SESSION['email'] = $data->email;
				$_SESSION['password'] = $data->password;
				$_SESSION['type'] = $_POST['type'];
				$this->home();
			}
	    }
	    else
	    {
			$this->render('initpage');;
	    }
	}

	/*
		la page d'acceuil du site selon le type d'utilisateur 
	*/
	public function home()
	 {
		switch($_SESSION['type'])
		{
			case 'client':
				$this->render('client/home');
			break;
			case 'traducteur':
				$this->render('traducteur/home');
			break;
			default :
			$this->render('error');		
		}
	 }

	 public function deconnexion()
	 {
	 	session_destroy();
	 	header('location:?p=connexion');
	 }



}
