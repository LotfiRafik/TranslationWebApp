<?php

namespace model;
use core\DataBase\database;

class admin extends \core\model\table{

	protected $table = "administrateur";
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
		$data = App::getDb()->query('SELECT * FROM administrateur');
		//DATA TABLEAU D'OBJETS
		return $data;
	}

	public function ajouter($array=[])		//Ajout d'un new compte administrateur
	{
		$this->insert($array);
		$client_id = $this->db->lastInsertId();
		return ($this->listec(array("id" => $client_id))[0]);
	}



	

 }
