<?php
/**
 * Database class
 * video 13 and 14
 */

namespace Model;

defined('ROOT') or exit("Access Denied");

use \Core\Database;

class Model extends Database
{
    // use \Core\Database;
    public $primaryKey = 'id';
    // public $table = '';
    // public $allowColumns = [];
    // public $allowUpdateColumns = [];
    // public $onUpdateValidationRules = [];
    // public $onInsertValidationRules = [];

    public $limit = 10;
    public $offset = 0;
    public $errors = [];

    protected function getPrimaryKey()
    {
        return $this->primaryKey ?? 'id';
    }
    public function getErrors($key)
    {
        if (!empty($this->errors)) {
            if (!empty($this->errors[$key])) {
                return $this->errors[$key];
            } else {
                return $this->errors;
            }
        }


        return "";
    }
    public function findAll()
    {
        $query = "select * from $this->table";
        $query .= " limit $this->limit offset $this->offset ";
        $result = $this->query($query);        
        return $result;
    }
    public function where($data, $data_not = [])
    {
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);
        foreach ($key as $k) {
            $query .= $k . " = :" . $k . " && ";
        }
        foreach ($key_not as $k) {
            $query .= $k . " != :" . $k . " && ";
        }
        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset ";
        // marge data because only one variable supply in the database class/trait
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }
    public function first($data, $data_not = [])
    {
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);
        foreach ($key as $k) {
            $query .= $k . " = :" . $k . " && ";
        }
        foreach ($key_not as $k) {
            $query .= $k . " != :" . $k . " && ";
        }
        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";

        // marge data because only one variable supply in the database class/trait
        $data = array_merge($data, $data_not);
        // echo json_encode($query);       
        $result = $this->query($query, $data, 'object');
        
        if ($result)
            return $result[0];

        return false;
    }

    public function insert($data)
    {
        if (!empty($this->allowColumns)) {
            foreach ($data as $key => $val) {
                if (!in_array($key, $this->allowColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "insert into $this->table(" . implode(',', $keys) . ") values(:" . implode(", :", $keys) . ")";
        $this->query($query, $data);       
        return false;
    }
    public function update($id, $data, $id_column = 'id')
    {

        if (!empty($this->allowUpdateColumns) || !empty($this->allowColumns)) {
            $this->allowUpdateColumns = !empty($this->allowUpdateColumns) ? $this->allowUpdateColumns: $this->allowColumns;
            foreach ($data as $d=>$val) {
                if (!in_array($d, $this->allowUpdateColumns)) {
                    unset($data[$d]);
                }
            }
        }
        $query = "update $this->table set ";
        $key = array_keys($data);

        foreach ($key as $k) {
            $query .= $k . " = :" . $k . ", ";
        }

        $query = trim($query, ", ");
        $query .= " where $id_column = :$id_column";
       
        $data[$id_column] = $id;      
        $this->query($query, $data);
        return false;
    }
    public function delete($id, $id_column = "id")
    {
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";     
        $this->query($query, $data);
        return false;
    }


    /**
     * Validation Rules
     */

    public function validate($data)
    {
        $this->errors = [];
        if (!empty($this->primaryKey) && !empty($data[$this->primaryKey])) {
            $validationRules = $this->onUpdateValidationRules;
        } else {
            $validationRules = $this->onInsertValidationRules;
        }

        if (!empty($validationRules)) {
            foreach ($validationRules as $column => $rules) {
                if (!isset($data[$column]))
                    continue;
                foreach ($rules as $rule) {
                    switch ($rule) {
                        case "required":
                            if (empty($data[$column])) {                           

                                $this->errors[$column] = "The " . ucfirst($column) . " is required";
                            }
                            break;
                        case "email":
                            if (!filter_var($data[$column], FILTER_VALIDATE_EMAIL)) {
                                $this->errors[$column] = "Invalid " . $column . " address";
                            }
                        case "ip":
                            if (!filter_var($data[$column], FILTER_VALIDATE_IP)) {
                                $this->errors[$column] = "Invalid " . $column . " address";
                            }
                            break;

                        case "mac":
                            if (false === filter_var($data[$column], FILTER_VALIDATE_MAC)) {
                                $this->errors[$column] = "Invalid " . $column . " address";
                            }
                           
                            break;

                        case "alpha_space":

                            if (!preg_match("/^[a-zA-Z ]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contains alphabetical letters";
                            }
                            break;
                        case "alpha":
                            if (!preg_match("/^[a-zA-Z]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contains alphabetical letters";
                            }
                            break;
                        case "not_less_than_8":
                            if (strlen(trim($data[$column])) < 8) {
                                $this->errors[$column] = ucfirst($column) . " should not be less than 8 characters";
                            }
                            break;
                       

                        case "alpha_numeric":
                            if (!preg_match("/^[a-zA-Z0-9]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contains alphabetical letters";
                            }
                            break;

                        case "numeric":
                            if (!preg_match("/^[0-9]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contains Number";
                            }
                            break;

                        case "alpha_symbol":
                            if (!preg_match("/^[a-zA-Z\-\_\$\%\*\[\]\(\)\&\{\}]+$/", trim($data[$column]))) {
                                $this->errors[$column] = ucfirst($column) . " should only contains alphabetical letters";
                            }
                            break;
                        case "alpha_numeric_symbol":
                            if (!preg_match("/^[a-zA-Z\-\_\$\%\*\[\]\(\)\&\{\}]+$/", $data[$column])) {
                                $this->errors[$column] = ucfirst($column) . " should only contains alphabetical letters";
                            }
                            break;
                        case "unique":

                            
                                    if ($this->where([$column => $data[$column]])) {                                        
                                        $this->errors[$column] = ucfirst($column) . " should be unique";
                                    }
                                
                            
                            break;
                        default:
                            $this->errors["rules"] = "The rule " . $rule . " was not found";
                            break;
                    }
                }
            }
        }
        if (empty($this->errors)) {        
            return true;
        }
        return false;
    }
}
