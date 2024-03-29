<?php
function APP($key = ''){
    global $APP;


    if(!empty($key)){
        return !empty($APP[$key]) ? $APP[$key] : null;
    }else{
        return $APP;
    }
    return null;
}
function show_plugin(){
    global $APP;
    $name = array_column($APP['plugins'],'name');
    dd($name ?? []);
}

function set_value(string|array $key, mixed $value=''){
    global $USER_DATA;
    $call_from = debug_backtrace();
    $ikey   = array_search(__FUNCTION__,array_column($call_from,'function'));
    $path   = get_plugin_dir(debug_backtrace()[$ikey]['file']).'config.json';

    if(file_exists($path)){
        $json = json_decode(file_get_contents($path));
        $plugin_id = $json->id;
        
        if(is_array($key)){
            foreach($key as $k=> $value){
    
                $USER_DATA[$plugin_id][$k] = $value;
            }
    
        }else{
    
            $USER_DATA[$plugin_id][$key] = $value;
        }
        return true;
    }



    
    return false;
}
function get_value(string $key =''):mixed{
    global $USER_DATA;
    $call_from = debug_backtrace();
    $ikey   = array_search(__FUNCTION__,array_column($call_from,'function'));
    $path   = get_plugin_dir(debug_backtrace()[$ikey]['file']).'config.json';

    if(file_exists($path)){
        $json = json_decode(file_get_contents($path));
        $plugin_id = $json->id;


    if(empty($key))
        return $USER_DATA;
    return !empty($USER_DATA[$plugin_id][$key]) ? $USER_DATA[$plugin_id][$key] : null;
    }
    
}
// ----------------------end-------------------------------

function split_url($url){
return explode("/",trim($url,'/'));

}
function URL($key = ''){
    global $APP;
    if(!empty($key) || $key == 0){
        if(!empty($APP['URL'][$key])){  
                  
            return $APP['URL'][$key];
        }

    }else{
        echo 'this is woriking';
    }
    return '';  
}

function get_plugin_folders(){
    $plugin_folder = 'plugins/';
    $folders = scandir($plugin_folder);
    $res = [];
    foreach($folders as $folder){
        if($folder != '.' && $folder != '..' && is_dir($plugin_folder.$folder)){
            $res[] = $folder;
        }
    }
   return $res;

}

function load_plugin($plugin_folder){
    global $APP;
   $loaded = false;
   
   foreach($plugin_folder as $folder){
       $file = 'plugins/'.$folder . '/config.json';
       if(file_exists($file)){

        $json = json_decode(file_get_contents($file));        

        if(is_object($json) && isset($json->id)){            
            if(!empty($json->active)){                
            $file = 'plugins/'.$folder . '/plugin.php';            
            
            if(file_exists($file) && valid_route($json)){                 
                    $json->index_file = $file;
                    $json->path ='plugins/'.$folder . '/';
                    $json->http_pathe = ROOT .'/'.$json->path;                   
                    $APP['plugins'][] = $json;
                    
                    
                }
            }
        }
       }

   }

    if(!empty($APP['plugins'])){
        foreach($APP['plugins'] as $json){           
         if(file_exists($json->index_file)){
             require $json->index_file;
             $loaded = true;
         }
        }
    }
   return $loaded;

}
function valid_route(object $json):bool
{
    if(!empty($json->routes->off) && is_array($json->routes->off)){

        if(in_array(page(),$json->routes->off))
            return false;        
    }

    if(!empty($json->routes->on ) && is_array($json->routes->on)){        
        if($json->routes->on[0] == 'all')
        return true;        
}
if(in_array(page(),$json->routes->on)){

    return true;
}
   

    return false;

}


function add_action(string $hook,mixed $func,int $priority=10){
    global $ACTIONS;
    while(!empty($ACTIONS[$hook][$priority])){
        $priority++;
    }
    $ACTIONS[$hook][$priority] = $func;
    return true;
}

function do_action(string $hook, array $data=[]){
    global $ACTIONS;
    if(!empty($ACTIONS[$hook])){
        ksort($ACTIONS[$hook]);
        foreach($ACTIONS[$hook] as $key=>$func){

            $func($data);
        }
    }
    
     
}

function add_filter(string $hook,mixed $func,$priority=10):bool{
    global $FILTER;
    while(!empty($FILTER[$hook][$priority])){
        $priority++;
    }
    $ACTIONS[$hook][$priority] = $func;
    return true;
    
}
function do_filter(string $hook, mixed $data =''):mixed{
    global $ACTIONS;
    if(!empty($ACTIONS[$hook])){
        ksort($ACTIONS[$hook]);
        foreach($ACTIONS[$hook] as $key=>$func){

            $data = $func($data);
        }
    }

    return $data;
    
}

function dd($data){
    echo "<pre><div style='margin:1px; background-color:#444; color:white; padding: 5px 10px'>";
    print_r($data);
    echo "</div></pre>";
}

function page(){
    return URL(0);
}

function redirect($url){
    header('Location: '. ROOT .'/'.$url);
}
function plugin_path($path=''){
    $call_from = debug_backtrace();
    $key = array_search(__FUNCTION__,array_column($call_from,'function'));
    return get_plugin_dir(debug_backtrace()[$key]['file']).$path;

}
function http_plugin_path($path=''){
    $call_from = debug_backtrace();
    $key = array_search(__FUNCTION__,array_column($call_from,'function'));
    return ROOT.DIRECTORY_SEPARATOR.get_plugin_dir(debug_backtrace()[$key]['file']).$path;
}

function get_plugin_dir($filepath){

    $path = '';
    $basename = basename($filepath);
    $path = str_replace($basename,'',$filepath);
    if(strstr($path,DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR)){
        $parts = explode(DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR,$path);
        $path = 'plugins'. DIRECTORY_SEPARATOR .$parts[1];
    }

    return $path;

}

function user_can($permission){
    global $APP;
return true;
}

function old_value(string $key, string $default='', string $type ='post'){

    $POST = ($type == 'post') ? $_POST : $_GET;   

    if(!empty($POST[$key]))
        return $POST[$key];
    return $default;
   

}
function old_selected(string $key, string $value, string $default='', string $type ='post'){

    $POST = ($type == 'post') ? $_POST : $_GET;
    
    if(!empty($POST[$key])){
        if($POST[$key] == $value){
            return ' selected ';
        }
    }else{
        if($default == $value){
            return ' selected ';
        }
    }
        
    return '';
   

}
function old_checked(string $key, string $value, string $default='', string $type ='post'){
    $POST = ($type == 'post') ? $_POST : $_GET;
    
    if(!empty($POST[$key])){
        if($POST[$key] == $value){
            return ' checked ';
        }
    }else{
        if($default == $value){
            return ' checked ';
        }
    }
        
    return '';
   

}

function csrf(string $sesKey = 'csrf', int $hours=1){
$ses = new \Core\Session;
$key = '';
$key = hash('sha256',time().rand(0,9));
$expires = time()+((60 * 60) * $hours);
$ses->set($sesKey,['key'=>$key,'expires'=>$expires]);
return "<input type='hidden' value ='$key' name='$sesKey' >";
}


function csrf_verify(array $post,string $sesKey = 'csrf'):bool{
    if(empty($post[$sesKey]))
    return 'false';
$ses = new \Core\Session;
$data = $ses->get($sesKey);

if(is_array($data)){
    if($data['key'] != $post[$sesKey]){
        return false;
    }
    if($data['expires'] > time()){
        echo 'is working';
        return true;
    }
    $ses->pop($sesKey);
}
return false;


}

function get_image($path='',$type = 'post'){
    if(file_exists($path))
        return ROOT . '/'. $path;

    if($type == 'post')
        return ROOT . '/assets/images/no_image.png';
    if($type == 'male')
        return ROOT . '/assets/images/user_male.jpeg';
    if($type == 'female')
        return ROOT . '/assets/images/user_female.jpeg';

        return ROOT . '/assets/images/no_image.png';


}