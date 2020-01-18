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

    //Retourner la moyenne des notes d'un traducteur 
    public function moyNotes($traducteur_id)
    {
      $arguments[0]=$traducteur_id;
      $statement = 'SELECT avg(note) AS moynote from '.$this->table.' WHERE traducteur_id=?';   
      return ($this->db->prepare($statement,$arguments)[0]);
    }


}