<?php

namespace model;
use core\DataBase\database;

class devis extends \core\model\table{

    protected $table = "devis";
	protected $db;

	public function __construct(){
		$db = new database();
		$this->db = $db;
    }
    
    public function getAll()
    {
        $data = $this->db->query('SELECT * FROM '.$this->table);
		//DATA TABLEAU D'OBJETS
		return $data;
    }

    /*
    //Ajout d'un nouveau devis 
    */
    public function ajouter($array=[])		
	{
        $this->insert($array);
        return $this->db->lastInsertId();
	}



}