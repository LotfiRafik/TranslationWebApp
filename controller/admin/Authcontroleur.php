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
		$this->render('connexion/connexion',null,$error);
	}




	 public function deconnexion()
	 {	
		session_destroy();
		$this->render('connexion/connexion');
	 }



}
