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
 

add_filter('header-footer_before_menu_links', function($links){
   
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




add_action('controller',function(){
    $vars = get_value();
    $req = new \Core\Request;
    if(!$req->posted() && page() != $vars['login_page'])
    {

        require plugin_path('controllers/login-controller.php');
    }else
    {
        if(!$req->posted() && page() != $vars['login_page']){
            require plugin_path('controllers/signup-controller.php');

        }
    }
    
});

// display the view files

add_action('view',function(){   
    $vars = get_value();
    $errors = [];
    $errors['email'] = "Invalid Email";
    // $errors['errors'] = $vars['errors'];
      
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