<?php
session_start();
require 'Autoloader.php';
Autoloader::register();

use core\Controller\controller;
use controller\Authcontroleur;
use controller\Clientcontroleur;
use controller\Traducteurcontroleur;

if(isset($_GET['p']))
  {
    $p  =  $_GET['p'];
  }
else {
   $p = "home"; //page d'acceuil du site
}

//---------------------------------------------------------------------------//
/*  Fonctionnalités de tout les membres  */
switch ($p)  
{
  case 'traducteurlist': //Liste des traducteurs
    $Traducteurcontroleur = new Traducteurcontroleur();     
    $Traducteurcontroleur->liste();
    exit(0);
    break;
  case 'home': //Page d'acceuil
    $Controller = new Controller();     
    $Controller->home();
    exit(0);
  break;
  case 'traducteurprofile':
    $Traducteurcontroleur = new Traducteurcontroleur();     //Profile traducteur
    $Traducteurcontroleur->profile($_GET['id']);
    exit(0);
  break;
}

/*  Fonctionnalités des membres authentifiés */
if(isset($_SESSION['id']))			  
{
  switch ($p)
  {
    case 'addTradDevis':
        $Clientcontroleur = new Clientcontroleur();
        $Clientcontroleur->ajouterTraducteurDevis();
      break; 
    case 'devis':
        $Clientcontroleur = new Clientcontroleur();
        $Clientcontroleur->echoDevis($_GET['id']);
      break;
    case 'sendTraduction':
      $Traducteurcontroleur = new Traducteurcontroleur();
      $Traducteurcontroleur->rendreTraduction();
      break;
    case 'noteTrad':
        $Clientcontroleur = new Clientcontroleur();
        $Clientcontroleur->noterTraduction();
       break; 
    case 'reqdevis':
    	 $Clientcontroleur = new Clientcontroleur();
       $Clientcontroleur->demanderDevis();
      break; 
    case 'addDemandeTrad':
        $Clientcontroleur = new Clientcontroleur();
        $Clientcontroleur->ajouterDemandeTrad();
      break;
    case 'addOffreDevis':
        $Traducteurcontroleur = new Traducteurcontroleur();
        $Traducteurcontroleur->ajouterOffre();
      break;
    case 'deconnexion':
    	$Authcontroleur = new Authcontroleur();
     	$Authcontroleur->deconnexion();
      break;
    //-----------------
    default:
      $Controller = new Controller();     //Page d'acceuil
      $Controller->home();
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
    case 'connexion':
      $Authcontroleur = new Authcontroleur();     //Se connecter
      $Authcontroleur->connexion();
    //-----------------
    default:
      $Controller = new Controller();     //Page d'acceuil
      $Controller->home();
  }
}
