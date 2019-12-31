<?php
namespace core\Controller;

class  Controller {

  public function render($vue,$array=[],$other=[])
  {	
    ob_start();
    require 'view/'.$vue.'.php';
    $content = ob_get_clean();
    require 'view/template/index.php';
    exit(0);
  }
}
