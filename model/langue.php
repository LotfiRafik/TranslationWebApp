<?php

namespace model;
use core\DataBase\database;

class langue extends \core\model\table{

    protected $table = "langue";
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


}