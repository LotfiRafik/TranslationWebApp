<?php

namespace model;
use core\DataBase\database;

class traducteur extends \core\model\table{

	protected $table = "traducteur";
	protected $db;

	public function __construct(){
		$db = new database("projetweb");
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



	

 }
