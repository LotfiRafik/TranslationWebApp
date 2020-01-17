<?php

namespace model;
use core\DataBase\database;

class offre extends \core\model\table{

    protected $table = "offre";
	  protected $db;

  	public function __construct(){
	  	$db = new database();
	  	$this->db = $db;
    }

    //Retourner le nombre d'offre d'un devis 
    public function getNbOffre($devis_id)
    {
      $arguments[0]=$devis_id;
      $statement = 'SELECT count(*) AS nb from '.$this->table.' WHERE devis_id=?';   
      return ($this->db->prepare($statement,$arguments)[0]);
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