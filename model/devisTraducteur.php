<?php

namespace model;
use core\DataBase\database;

class devisTraducteur extends \core\model\table{

    protected $table = "devis_traducteur";
	protected $db;

	public function __construct(){
		$db = new database();
		$this->db = $db;
    }
       
    public function listec($array=[])
	{
		$data = $this->select($array);
		return $data;
    }
    
     /*
    //Ajout d'un nouveau traducteur 
    */
    public function ajouter($array=[])		
	{
            $this->insert($array);
    }
    
    /* 
        Selectionner les traducteurs d'un devis 
    */
    public function getAll($devis_id)
    {
        $array['devis_id'] = $devis_id;
        return ($this->select($array));
    }

   

}