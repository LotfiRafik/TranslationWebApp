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
  case 'recrutement': 
    $Traducteurcontroleur = new Traducteurcontroleur();     
    $Traducteurcontroleur->signup();
    exit(0);
    break;
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
  case 'traducteurprofile':      //Profile traducteur
    $Traducteurcontroleur = new Traducteurcontroleur();
    $Traducteurcontroleur->profile($_GET['id']);
    exit(0);
  case 'clientprofile':      //Profile client
    $Clientcontroleur = new Clientcontroleur();
    $Clientcontroleur->profile($_GET['id']);
    exit(0);
  break;
}

/*  Fonctionnalités des membres authentifiés */

if(isset($_SESSION['id']))			  
{
  switch ($_SESSION['type']) {
    /*  Fonctionnalités des clients */

    case 'client':
      $Clientcontroleur = new Clientcontroleur();
      switch ($p)
      {
        case 'addTradDevis':
            $Clientcontroleur->ajouterTraducteurDevis();
          break; 
          case 'addTradDevis2':
            $Clientcontroleur->ajouterTraducteurDevis2();
          break; 
        case 'signaler':
            $Clientcontroleur->signaler();
          break; 
        case 'devis':
            $Clientcontroleur->echoDevis($_GET['id']);
          break; 
        case 'downTrad':
            $Clientcontroleur->downloadTraduction($_GET['did'],$_GET['tid']);
          break;
        case 'downDevis':
            $Clientcontroleur->downloadDevis($_GET['did']);
          break;
        case 'noteTrad':
            $Clientcontroleur->noterTraduction();
           break; 
        case 'getTrad':
            $Clientcontroleur->getTraducteurDispo();
           break; 
        case 'reqdevis':
           $Clientcontroleur->demanderDevis();
          break; 
        case 'reqTraduction':
          $Clientcontroleur->demanderDevis();
          break;
        case 'addDemandeTrad':
            $Clientcontroleur->ajouterDemandeTrad();
          break;
          case 'editProfile':
            $Clientcontroleur->editProfile();
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
      break;
    /*  Fonctionnalités des traducteurs */
    case 'traducteur':
      $Traducteurcontroleur = new Traducteurcontroleur();
      switch ($p)
      {
        case 'editProfile':
          $Traducteurcontroleur->editProfile();
        break;
        case 'downTrad':
          $Traducteurcontroleur->downloadTraduction($_GET['did']);
        break;
        case 'downDevis':
          $Traducteurcontroleur->downloadDevis($_GET['did']);
        break;
        case 'sendTraduction':
            $Traducteurcontroleur->rendreTraduction();
          break;
        case 'addOffreDevis':
            $Traducteurcontroleur->ajouterOffre();
          break;
        case 'signaler':
            $Traducteurcontroleur->signaler();
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
      break;
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
