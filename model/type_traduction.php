<?php

namespace model;
use core\DataBase\database;

class type_traduction extends \core\model\table{

    protected $table = "traduction_type";
	protected $db;

	public function __construct(){
		$db = new database();
		$this->db = $db;
    }
    
    public function getTypeDispo()
    {
        $data = $this->db->query('SELECT * FROM '.$this->table);
		//DATA TABLEAU D'OBJETS
		return $data;
    }


}
    