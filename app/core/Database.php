<?php
/**
 * Database class
 * video 12
 */
namespace Core;
use \PDO;
use \PDOException;
defined('ROOT') OR exit("Access Denied");

/**
 * Video 12
 * topic: Database
 */
class Database{
    public static $query_id        = '';
    public $affected_row            = 0;
    public $inserted_id             = 0;
    public $sql_error                   = '';
    public $has_error               = false;
    public $table_exists_db         ='';
    public $missing_table           = [];
    private function connect(){
        $VARS['DB_NAME']        = DB_NAME;
        $VARS['DB_USER']        = DB_USER;
        $VARS['DB_PASSWORD']    = DB_PASSWORD;
        $VARS['DB_HOST']        = DB_HOST;
        $VARS['DB_DRIVER']      = DB_DRIVER;

        $VARS = do_filter('before_db_connect',$VARS);
        $this->table_exists_db = $VARS['DB_NAME'];


        $string = "$VARS[DB_DRIVER]:hostname=$VARS[DB_HOST];dbname=$VARS[DB_NAME]";

        try {
            $con = new PDO($string,$VARS['DB_USER'],'');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
           die("Fail to connect to database due to error " . $e->getMessage());
        }
        return $con;
    }


    public function get_row(string $query, array $data =[], string $data_type = 'object'){
        $result = $this->query($query,$data,$data_type);
        if(is_array($result) && count($result)>0){
            return $result[0];
        }
        return false;
    }

    public function query(string $query, array $data =[], string $data_type = 'object'){

        $query = do_filter('before_query',$query);
        $data = do_filter('before_data',$data);

        $this->sql_error                  = '';
        $this->has_error               = false;

        $con = $this->connect();
        try {
            $stm = $con->prepare($query);
            $result = $stm->execute($data);

            $this->affected_row = $stm->rowCount();
            $this->inserted_id = $con->lastInsertId();

           


        if($result){
            if($data_type == 'object'){
                $rows = $stm->fetchAll(PDO::FETCH_OBJ);                             
               
            }else{
               
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
               

            }
        } $arr = [];
        $arr['query']       = $query;
        $arr['data']        = $data;
        $arr['result']      = $rows ?? [];
        $arr['query_id']    = self::$query_id;
        self::$query_id     ='';  
        

        $result = do_filter('after_query',$arr);

       
        } catch (PDOException $e) {
            $this->sql_error               = $e->getMessage();               
            $this->has_error               = true;           
        }
       
        

        if(is_array($result) && count($result)>0){ 
               
            return $result['result'];
        }
        return false;

    }
    public function table_exists(string|array $mytables):bool
    {
        global $APP;
        $missing_table = [];
        if(empty($APP['tables']))
        {
            $this->error = '';
            $this->has_error = false;
            $con = $this->connect();
            $query = "SELECT TABLE_NAME AS tables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA ='".$this->table_exists_db."'";
            $res = $APP['tables'] = $this->query($query);
            $result = $APP['tables'] = $res;
        }else
        {
            $result = $APP['tables'];
        }
        if($result)
        {
            $all_tables = array_column($result,'tables');
            if(is_string($mytables))
            {
                $mytables = [$mytables];
                

            }          

            $count = 0;
                

            foreach($mytables as $key=> $table)
            {
                
                if(in_array($table,  $all_tables))
                {                   
                    $count++;
                    
                }else{
                    $this->missing_table[] = $table;
                }
                
            }
          
            if($count == count($mytables))
            {               
                return true;
            }
            return false;

            
        }

    }
}

