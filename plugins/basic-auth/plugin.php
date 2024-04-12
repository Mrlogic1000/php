<?php

/**
 * Basic Authentication
 * Descriptions
 */

set_value([
    "signup_page" => "signup",
    "login_page" => "login",
    "logout_page" => "logout",
    "admin_plugin_route" => "admin",
    "table" => []

]);
add_action('controller', function () {
    $vars = get_value();
    $req = new \Core\Request;
    $ses = new \Core\Session;

    if ($req->posted() && page() == $vars['login_page'])
        require plugin_path('controllers/login-controller.php');

    else
    if ($req->posted() && page() == $vars['signup_page'])
        require plugin_path('controllers/signup-controller.php');
    else
    if (page() == $vars['logout_page'])
        require plugin_path('controllers/logout-controller.php');
});

// require plugin_path('controllers/logout-controller.php'); 

// add_filter('basic-admin_before_admin_links', function ($links) 
// {
    
//     $obj = (object)[];
//     $obj->title = 'User';
//     $obj->link = ROOT;
//     $obj->icon = 'fa-solid fa-earth-africa';
//     $obj->parent = 0;
//     $links[] = $obj;

//     return $links;
// });



add_filter('header-footer_before_menu_links', function ($links) 
{
    $ses = new \Core\Session;
    $vars = get_value();
    $link = (object)[];

    $link->id = 0;
    $link->title = 'Signup';
    $link->slug = 'signup';
    $link->icon = '';
    $link->permission =  'not_logged_in';
    $links[] = $link;

    $link = (object)[];
    $link->id = 0;
    $link->title = 'Admin';
    $link->slug = $vars['admin_plugin_route'];
    $link->icon = '';
    $link->permission =  'logged_in';
    $links[] = $link;



    $link = (object)[];

    $link->id = 0;
    $link->title = 'Login';
    $link->slug = 'login';
    $link->icon = '';
    $link->permission = 'not_logged_in';

    $links[] = $link;

    $link = (object)[];

    $link->id = 0;
    $link->title = 'Logout';
    $link->slug = 'logout';
    $link->icon = '';
    $link->permission = 'logged_in';
    $links[] = $link;

    $link = (object)[];

    $link->id = 0;
    $link->title = 'Hi ' . $ses->user('first_name');
    $link->slug = 'profile/' . $ses->user('id');
    $link->icon = '';
    $link->permission = 'logged_in';
    $links[] = $link;

    return $links;
});






// display the view files

add_action('view', function () {
    $vars = get_value();
    $errors = $vars['errors'] ?? [];
    // dd($errors);

    if (page() == $vars["login_page"])
        require plugin_path('views/login.php');
    else
if (page() == $vars['signup_page'])
        require plugin_path('views/signup.php');
});

// for manipulate data ater query operation
add_filter('after_query', function ($data) {

    if (empty($data['result']))
        return $data;

    foreach ($data['result'] as $key => $row) {
    }

    return $data;
});
// dd(debug_backtrace());