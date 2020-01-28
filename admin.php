<?php
session_start();
require 'Autoloader.php';
Autoloader::register();

use controller\admin\controller;
use controller\admin\Authcontroleur;
use controller\admin\Admincontroleur;


if(isset($_GET['p']))
  {
    $p  =  $_GET['p'];
  }
else {
   $p = "home"; //page d'acceuil du site
}

//---------------------------------------------------------------------------//
/*  Fonctionnalités des administrateurs*/

if(isset($_SESSION['id']))			  
{
      $Admincontroleur = new Admincontroleur();
      switch ($p)
      {
        case 'gestionTrad':
            $Admincontroleur->gestionTraducteur();
          break; 
        case 'editTraducteur':
            $Admincontroleur->editTraducteur();
          break;
        case 'bloquerTraducteur':
            $Admincontroleur->bloquerTraducteur();
          break; 
        case 'debloquerTraducteur':
            $Admincontroleur->debloquerTraducteur();
          break; 
          case 'traducteurProfile':
            $Admincontroleur->traducteurProfile($_GET['id']);
          break; 
        //Gestion Client
          case 'gestionClient':
            $Admincontroleur->gestionClient();
          break; 
        case 'editClient':
            $Admincontroleur->editClient();
          break;
        case 'bloquerClient':
            $Admincontroleur->bloquerClient();
          break; 
        case 'debloquerClient':
            $Admincontroleur->debloquerClient();
          break;
          case 'clientProfile':
            $Admincontroleur->clientProfile($_GET['id']);
          break; 
          case 'clientDevis':
            $Admincontroleur->echoDevis($_GET['id']);
          break; 

        //Gestion Document
        case 'gestionDocument':
          $Admincontroleur->gestionDocument();
        break; 

        case 'supDocument':
          $Admincontroleur->deleteDocument($_GET['did']);
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
    $Authcontroleur = new Authcontroleur();     //Se connecter
    $Authcontroleur->connexion();
}
