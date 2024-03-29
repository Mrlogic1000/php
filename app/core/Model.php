<?php
namespace Model;
defined('ROOT') OR exit("Access Denied");
use \Core\Database;
class Model extends Database{
    // use \Core\Database;
    
    public $limit = 10;
    public $offset = 0;
    protected $errors = [];
    protected function getPrimaryKey(){
        return $this->primaryKey ?? 'id';
    }
    public function getErrors($key){
        if(!empty($this->errors[$key])){
            return $this->errors[$key];

        }
        return "";
    }
    public function findAll()
    {
        $query = "select * from $this->table";
        $result = $this->query($query);
       return $result;
    }
    public function where($data,$data_not = []){
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);
        foreach ($key as $k){
            $query .= $k ." = :".$k . " && ";
           
        }
        foreach ($key_not as $k){
            $query .= $k ." != :".$k . " && ";           
        }
        $query = trim( $query," && ");
        $query .= " limit $this->limit offset $this->offset";        
        // marge data because only one variable supply in the database class/trait
        $data = array_merge($data, $data_not);
       return $this->query($query, $data);
       
    }
    public function first($data,$data_not = []){
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);
        foreach ($key as $k){
            $query .= $k ." = :".$k . " && ";
           
        }
        foreach ($key_not as $k){
            $query .= $k ." != :".$k . " && ";
           
        }
        $query = trim( $query," && ");
        $query .= " limit $this->limit offset $this->offset";        
        // marge data because only one variable supply in the database class/trait
        $data = array_merge($data, $data_not);
       $result = $this->query($query, $data);     
       if($result)
           return $result[0];
       
       return false;
    }

    public function insert($data){
        if(!empty($this->allowColumns)){
            foreach ($data as $key=>&$val){
                if(!in_array($key, $this->allowColumns)){
                    unset($data[$key]);

            }
        }
    }
        $keys = array_keys($data);
        $query = "insert into $this->table(" . implode(',',$keys) . ") values(:".implode(", :",$keys) .")";
        // print_r($data);
        $this->query($query, $data);
        // echo $query;
        return false;
    }
    public function update($id,$data,$id_column = 'id'){
        if(!empty($this->allowUpdateColumns)){
            foreach ($data as $d){
                if(!in_array($d, $this->allowUpdateColumns)){
                    unset($data[$d]);

            }
        }
    }
        $query = "update $this->table set ";
        $key = array_keys($data);
       
        foreach ($key as $k){
            $query .= $k ." = :".$k . ", ";           
        }
       
        $query = trim( $query,", ");  
        $query .= " where $id_column = :$id_column";         
        
        $data[$id_column] = $id;
       $this->query($query, $data);
       return false;
    

    }
    public function delete($id, $id_column = "id"){
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";
        $this->query($query, $data);
        return false;
    }
}