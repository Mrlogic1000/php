<?php

/**
 * Basic Authentication
 * Descriptions
 */

 set_value([
    "login_page"=>"login",
    "signup_page"=>"signup",
    "table"=>[

    ]

 ]);




add_action('controller',function(){
    $vars = get_value();
require plugin_path('controllers/controller.php');
});

// display the view files

add_action('view',function(){   
    $vars = get_value();
      
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