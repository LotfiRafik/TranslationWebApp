<?php

namespace controller;
use model\traducteur;

class Traducteurcontroleur extends \core\Controller\controller {

    public function liste()
	{
		$traducteur = new traducteur();
		$liste = $traducteur->liste();
		//$liste : tableau d'objets  $liste = $data ;
		$this->render('profiles/profiles',$liste);
	}

}
