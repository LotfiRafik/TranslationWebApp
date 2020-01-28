<?php
namespace controller\admin;
use model\type_traduction;
use model\client;
use model\admin;



class  Controller {

  public function render($vue,$data=[],$error=[])
  {	
    ob_start();
    require 'view/admin/'.$vue.'.php';
    $content = ob_get_clean();
    require 'view/admin/template/index.php';
    exit(0);
  }

  public function home()
  {
    $this->render('home');		//page d'acceuil des administrateurs
  }



  
}
