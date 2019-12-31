<?php
session_start();
require 'Autoloader.php';
Autoloader::register();

use controller\Authcontroleur;
use controller\Clientcontroleur;
use controller\Traducteurcontroleur;



if(isset($_GET['p']))
  {
    $p  =  $_GET['p'];
  }
else {
   $p = "initpage"; //page d'acceuil du site
}

//---------------------------------------------------------------------------//
/*  Fonctionnalités de tout les membres  */
switch ($p)  
{
  case 'traducteurlist':
    $Traducteurcontroleur = new Traducteurcontroleur();     //Liste des traducteurs
    $Traducteurcontroleur->liste();
    break;
}

/*  Fonctionnalités des membres authentifiés */
if(isset($_SESSION['id']))			  
{
  switch ($p)
  {
    case 'deconnexion':
    	$Authcontroleur = new Authcontroleur();
     	$Authcontroleur->deconnexion();
      break;
    //-----------------
    default:
      $Authcontroleur = new Authcontroleur();
      $Authcontroleur->home();
  }
}

/*  Fonctionnalités des membres non authentifiés */

else            
{
  switch ($p)
  {
    case 'signup':
      $Authcontroleur = new Authcontroleur();     //S'inscrire 
      $Authcontroleur->signup();
      break;
    default:
      $Authcontroleur = new Authcontroleur();     //Se connecter
      $Authcontroleur->connexion();
  }
}
