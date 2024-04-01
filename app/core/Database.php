<?php
namespace Core;
use \PDO;
use \PDOException;
defined('ROOT') OR exit("Access Denied");

class Database{
    private static $query_id        = '';
    public $affected_row            = 0;
    public $inserted_id             = 0;
    public $error                   = '';
    public $has_error               = false;
    private function connect(){
        $VARS['DB_NAME']        = DB_NAME;
        $VARS['DB_USER']        = DB_USER;
        $VARS['DB_PASSWORD']    = DB_PASSWORD;
        $VARS['DB_HOST']        = DB_HOST;
        $VARS['DB_DRIVER']      = DB_DRIVER;
        $VARS = do_filter('before_db_connect',$VARS);

        $string = "$VARS[DB_DRIVER]:hostname=$VARS[DB_HOST];dbname=$VARS[DB_NAME]";
        try {
            $con = new PDO($string,$VARS['DB_USER'],'');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
           die("Fail to connect to database due to error " . $e->getMessage());
        }
        return $con;
    }


    public function get_query(string $query, array $data =[], string $data_type = 'object'){
        $result = $this->query($query,$data,$data_type);
        if(is_array($result) && count($result)>0){
            return $rows[0];
        }
        return false;
    }

    public function query(string $query, array $data =[], string $data_type = 'object'){

        $query = do_filter('before_query',$query);
        $data = do_filter('before_data',$data);

        $this->error                   = '';
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
                echo "rows here";
                $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

            }
        }
        } catch (PDOException $e) {
            $this->error                   = $e->getMessage();
            echo $this->error;
            $this->has_error               = true;

           
        }
       
        $arr = [];
        $arr['query']       = $query;
        $arr['data']        = $data;
        $arr['result']      = $rows ?? [];
        $arr['query_id']    = self::$query_id;
        self::$query_id     ='';

        $result = do_filter('after_filter',$arr);
        if(is_array($result) && count($result)>0){
            return $result;
        }
        return false;

    }
}

