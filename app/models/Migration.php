<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");
use \Core\Database;
class Migration extends Database{

    protected $columns              = [];
    protected $keys                 = [];
    protected $primarykeys          = [];
    protected $uniqueKeys           = [];
    protected $fullTextKeys          = [];
    protected $data                 = [];

    protected function createTable($table){
       if(!empty($this->columns)){
        $query = "CREATE TABLE IF NOT EXISTS $table (";

       foreach($this->columns as $column){
        $query.= $column . ",";
       }
       foreach($this->primarykeys as $key){
        $query.= "PRIMARY KEY (".$key . "),";
       }
       foreach($this->fullTextKeys as $key){
        $query.= "FULLTEXT KEY (".$key . "),";
       }
       foreach($this->uniqueKeys as $key){
        $query.= "UNIQUE KEY (".$key . "),";
       }
       foreach($this->keys as $key){
        $query.= "KEY (".$key . "),";
       }
       $query = trim($query,',');
       $query .= ") ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
       
       $this->query($query);
       $this->columns              = [];
       $this->keys                 = [];
       $this->primarykeys          = [];
       $this->uniqueKeys           = [];
        echo "\n\r Table $table successfully created\n\r";
        
    }else{
           echo "\n\r Table $table could not be created\n\r";

       }
    }
    protected function addColumn($text){
        $this->columns[] = $text;

    }
    protected function addPrimaryKey($key){
        $this->primarykeys[] = $key;

    }
    protected function addKey(string $key){
        $this->keys[] = $key;

    }
    protected function addUniqueKey(string $key){
        $this->uniqueKeys[] = $key;

    }
    protected function fullTextKey(string $key){
        $this->fullTextKeys[] = $key;

    }
    protected function addData(array $datas):void{
        foreach($datas as $key=>$data){

            $this->data[$key] = $data;
        }

    }
    protected function dropTable($table){
        $this->query('drop table '.$table);
        echo "\n\r Table $table successfully removed\n\r";

    }
    protected function insertData(string $table){
        if(!empty($this->data)){
            $keys = array_keys($this->data);
            $query = "insert into $table (".implode(",",$keys). ") values (:".implode(",:",$keys) .")";
           
        $this->query($query,$this->data);
        $this->data = [];
        echo "\n\r Data successfully inserted into $table\n\r";
        
    }else{
            echo "\n\r Data could not be inserted into $table\n\r";

        }
        
    }

}