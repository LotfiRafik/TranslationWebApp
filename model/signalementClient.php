<?php

namespace model;
use core\DataBase\database;

class signalementClient extends \core\model\table{

    protected $table = "signalement_client";
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
    
    public function getAll()
    {
        $listDevis = $this->db->query('SELECT * FROM '.$this->table);
		//DATA TABLEAU D'OBJETS
		return $listDevis;
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