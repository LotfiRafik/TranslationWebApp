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
   $p = "home"; //page d'acceuil du site
}

//---------------------------------------------------------------------------//
/*  Fonctionnalités de tout les membres  */
switch ($p)  
{
  case 'traducteurlist':
    $Traducteurcontroleur = new Traducteurcontroleur();     //Liste des traducteurs
    $Traducteurcontroleur->liste();
    break;
  case 'home':
    $Authcontroleur = new Authcontroleur();     //Page d'acceuil
    $Authcontroleur->home();
  break;
  case 'traducteurprofile':
    $Traducteurcontroleur = new Traducteurcontroleur();     //Profile traducteur
    $Traducteurcontroleur->profile($_GET['id']);
  break;
}

/*  Fonctionnalités des membres authentifiés */
if(isset($_SESSION['id']))			  
{
  switch ($p)
  {
    case 'reqdevis':
    	$Clientcontroleur = new Clientcontroleur();
     	$Clientcontroleur->demanderDevis();
      break; 
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
    case 'connexion':
      $Authcontroleur = new Authcontroleur();     //Se connecter
      $Authcontroleur->connexion();
    //-----------------
    default:
      $Authcontroleur = new Authcontroleur();
      $Authcontroleur->home();
  }
}
