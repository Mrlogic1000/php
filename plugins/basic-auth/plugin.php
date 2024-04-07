<?php

/**
 * Basic Authentication
 * Descriptions
 */

 
 

add_filter('header-footer_before_menu_links', function($links){
    $vars = get_value();
    $link = (object)[];
   
    $link->id = 0;
    $link->title = 'Signup';
    $link->slug = 'signup';
    $link->image = '';
    $link->permission = '';
   
    $links[] = $link;

    $link = (object)[];
   
    $link->id = 0;
    $link->title = 'Login';
    $link->slug = 'login';
    $link->image = '';
    $link->permission = '';
     $links[] = $link;  
        return $links;
});

set_value([
    "signup_page"=>"signup",
    "login_page"=>"login",
    "table"=>[

    ]

 ]);


add_action('controller',function(){
    $vars = get_value();
    $req = new \Core\Request;
    if($req->posted() && page() == $vars['login_page'])
   {    
       require plugin_path('controllers/login-controller.php');
    }
    else
      if($req->posted() && page() == $vars['signup_page']){
        require plugin_path('controllers/signup-controller.php');       
    }
    
});

// display the view files

add_action('view',function(){   
    $vars = get_value();      
    $errors = $vars['errors'] ?? [];
    // dd($errors);
      
if(page() == $vars["login_page"]){
    require plugin_path('views/login.php');
}else
if(page() == $vars['signup_page']){
    require plugin_path('views/signup.php');

}
    

});

// for manipulate data ater query operation
add_filter('after_query',function($data){

    if(empty($data['result']))
    return $data;

    foreach($data['result'] as $key=>$row){

    }

    return $data;

});