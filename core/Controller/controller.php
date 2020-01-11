<?php
namespace core\Controller;
use model\type_traduction;

class  Controller {

  public function render($vue,$data=[],$error=[])
  {	
    ob_start();
    require 'view/'.$vue.'.php';
    $content = ob_get_clean();
    require 'view/template/index.php';
    exit(0);
  }

  public function home()
  {
   if(isset($_SESSION['type']))
   {
     switch($_SESSION['type'])
     {
       case 'client':
         $this->render('client/home');		//page d'acceuil des clients
       break;
       case 'traducteur':
         $this->render('traducteur/home');	//page d'acceuil des traducteurs
       break;	
     }
   }
   else
     $this->render('initpage');		//page d'acceuil des membres non authentifiés

  }
  
}
