<?php
namespace core\model;

class table
{
    protected $table = "";
    protected $db = "";

	  public function insert($array=[])
  	{

        $sql_parts=[];
        $arguments=[];
        $inteog=[];
        $i = 0;
        foreach($array as $k=>$v)
        {
        	$sql_parts[$i]=$k;
        	$arguments[$i]=$v;
        	$inteog[$i]='?';
            $i++;
        }

        $a = implode(",",$sql_parts);
        $b = implode(",",$inteog);

        $statement = 'INSERT INTO '.$this->table. '('.$a.') VALUES ('.$b.')';
        $this->db->prepare($statement,$arguments);
    }

    public function select($array=[])
    {
        //('SELECT * from user WHERE username=:username and password=:password',$array);
        $sql_parts=[];
        $arguments=[];
        $i = 0;
        foreach($array as $k=>$v)
        {
            $sql_parts[$i]= $k.'=?';
            $arguments[$i]=$v;
            $i++;
        }
        $a = implode(" and ",$sql_parts);
        $statement = 'SELECT * from '.$this->table.' WHERE ' .$a;

        return ($this->db->prepare($statement,$arguments));
    }

    public function update($array=[],$id)
    {

        $sql_parts=[];
        $arguments=[];
        $i = 0;
        foreach($array as $k=>$v)
        {
            $sql_parts[$i]= $k.'=?';
            $arguments[$i]=$v;
            $i++;
        }
        $arguments[$i]=$id;
        $a = implode(",",$sql_parts);
        $statement = 'UPDATE '.$this->table.' SET ' .$a. ' WHERE id=?';
        $this->db->prepare($statement,$arguments);
    }

    public function delete($array=[])
    {
        //('DELETE * from user WHERE username=:username and password=:password',$array);
        $sql_parts=[];
        $arguments=[];
        $i = 0;
        foreach($array as $k=>$v)
        {
            $sql_parts[$i]= $k.'=?';
            $arguments[$i]=$v;
            $i++;
        }
        $a = implode(" and ",$sql_parts);
        $statement = 'DELETE from '.$this->table.' WHERE ' .$a;

        $this->db->prepare($statement,$arguments);
    }




}
