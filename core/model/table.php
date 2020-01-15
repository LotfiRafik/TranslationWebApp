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

        
    public function update($array=[],$array2=[])
    {
        $i = 0;
        foreach($array as $k=>$v)
        {
            $sql_parts1[$i]= $k.'=?';
            $arguments[$i]=$v;
            $i++;
        }
        foreach($array2 as $k=>$v)
        {
            $sql_parts2[$i]= $k.'=?';
            $arguments[$i]=$v;
            $i++;
        }
        $a = implode(",",$sql_parts1);
        $b = implode(" and ",$sql_parts2);
        $statement = 'UPDATE '.$this->table.' SET ' .$a. ' WHERE '.$b;
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
