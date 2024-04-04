<?php
namespace Core;
defined('ROOTPATH') OR exit("Access Denied");
class Session{
    public $mainkey = 'APP';
    public $userkey = 'USER';
private function start_session():int{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return 1;

}
public function set(mixed $keyOrArray, mixed $value = ''):int{
    $this->start_session();
    if(is_array($keyOrArray)){
        foreach($keyOrArray as $key => $value){
            $_SESSION[$this->mainkey][$key] = $value;
        }
        return 1;
    }
    $_SESSION[$this->mainkey][$keyOrArray] = $value;
    return 1;


}
public function get(mixed $key, mixed $default = ''):mixed{
    $this->start_session();
    if(isset($_SESSION[$this->mainkey][$key])){
        return $_SESSION[$this->mainkey][$key];

    }
    return 0;

}

public function auth(mixed $user_row):int{
    $this->start_session();
    $_SESSION[$this->userkey] = $user_row;
    return 0;
}

public function logout():int{
    $this->start_session();
    if(!empty($_SESSION[$this->userkey])){
    unset($_SESSION[$this->userkey]);
    }
    return 0;
}
public function is_admin(){
    if($this->is_logged_in())
        return false;
    
    $arr = do_filter('before_check_admin', ['is_admin' => false]);    
    if($arr['is_admin'])
        return true;
    return false;
}
public function is_logged_in():bool{
    $this->start_session();
    if(!empty($_SESSION[$this->userkey])){
        return true;
    }

    return false;
}

    // public function is_admin():bool{
    //     $this->start_session();
    //     $db = new \Core\Database;
    //     if(!empty($_SESSION[$this->userkey])){
    //         $arr = [];
    //         $rr['id'] = $_SESSION[$this->userkey]->rolde_id;
    //         if($db-get_row("select * from auth_roles where id = :id && role = 'admin' limit 1"))
    //     }
    // }
    public function user(string $key = '', mixed $default = ''):mixed{
        $this->start_session();
        if(empty($key) && !empty($_SESSION[$this->userkey])){
            return $_SESSION[$this->userkey];
        }else
        if(!empty($_SESSION[$this->userkey]->$key)){
           if(is_object($_SESSION[$this->userkey]->$key)){
            return $_SESSION[$this->userkey]->$key;
           }
           if(is_array($_SESSION[$this->userkey][$key])){
            return $_SESSION[$this->userkey]->$key;
           }
        }
        return $default;

    }
    public function pop(string $key, mixed $default = ''):mixed{
        $this->start_session();
        if(!empty($_SESSION[$this->mainkey][$key])){
            $value = $_SESSION[$this->mainkey][$key];
            unset($_SESSION[$this->mainkey][$key]);
            return $value;
        }
        return $default;
        
    }
    public function all():mixed{
        $this->start_session();
        if(isset($_SESSION[$this->mainkey]))
        {
            return $_SESSION[$this->mainkey];
        }
        return [];

    }
    
    
}