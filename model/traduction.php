<?php

namespace model;
use core\DataBase\database;

class traduction extends \core\model\table{

  protected $table = "traduction";
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
		  return $listDevis;
    }

    /*
    //Ajout d'une nouvelle traduction
    */
  public function ajouter($array=[])		
	{
        $this->insert($array);
        return $this->db->lastInsertId();
  }


}