<?php

namespace model;
use core\DataBase\database;

class traducteur extends \core\model\table{

	protected $table = "traducteur";
	protected $db;

	public function __construct(){
		$db = new database();
		$this->db = $db;
	}
	
	public function connexion($array=[])
	{
		$data = $this->select($array);
		if($data)		
		{
	    	return ($data[0]);
		}
		return $data;	//sinon on return 'false'
	}

	
	public function listec($array=[])
	{
		$data = $this->select($array);
		return $data;
	}

	public function liste()				//Return tt les comptes
	{
		$data = $this->db->query('SELECT * FROM '.$this->table);

		//DATA TABLEAU D'OBJETS
		return $data;
	}

	public function filterTraducteur($langue_s,$langue_d,$assermente)
	{
		$statement = 'SELECT * from '.$this->table.' WHERE 
		(langue1="'.$langue_s.'" OR 
		langue2="'.$langue_s.'" OR
		langue3="'.$langue_s.'" OR
		langue4="'.$langue_s.'" OR
		langue5="'.$langue_s.'") 
		AND
		(langue1="'.$langue_d.'" OR
		langue2="'.$langue_d.'" OR
		langue3="'.$langue_d.'" OR
		langue4="'.$langue_d.'" OR
		langue5="'.$langue_d.'")
		AND
		assermente='.$assermente;
		$data = $this->db->query($statement);
		return $data;
	}

	

 }
