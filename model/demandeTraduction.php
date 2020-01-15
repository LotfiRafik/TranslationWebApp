<?php

namespace model;
use core\DataBase\database;

class demandeTraduction extends \core\model\table{

    protected $table = "demande_traduction";
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
    //Ajout d'une nouvelle demande 
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