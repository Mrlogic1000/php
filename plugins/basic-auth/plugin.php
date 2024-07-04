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
    "asset_plugin_route" => "asset",
    "tables" => [
        'users_table' => 'users'
    ],
    'optional_table' => [
        'users_table'               => 'users',
        'roles_table'               => 'user_roles',
        'permissions_table'         => 'role_permissions',
        'roles_map_table'           => 'user_roles_map',
    ]

]);
$db = new \Core\Database;
$tables = get_value()['tables'];
if (!$db->table_exists($tables)) {
    dd('Missing database tables in ' . plugin_id() . ' plugin : ' . implode(',', $db->missing_table));
    die;
}

// add_filter('user_permissions', function ($permissions) {
//     $ses = new \Core\Session;
//     if ($ses->is_logged_in()) {
//         $vars = get_value();
//         $db = new \Core\Database;
//         $query = "select * from " . $vars['optional_table']['roles_table'];
//         $roles = $db->query($query);

//         if (is_array($roles)) {
//             $user_id = $ses->user('id');
//             $query = " select permission from " . $vars['optional_table']['permissions_table'] . " where disable = 0 && role_id in  ( select role_id from " .
//                 $vars['optional_table']['roles_map_table'] . " where disable = 0 && user_id = :user_id)";
//             $perms = $db->query($query, ['user_id' => $user_id]);
//             if ($perms) {
//                 $permissions = array_column($perms, 'permission');
//             }
//         } else {
//             $permissions[] = 'all';
//         }
//     }

//     return $permissions;
// });


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





add_filter('header-footer_before_menu_links', function ($links) {
    $ses = new \Core\Session;
    $vars = get_value();
    $errors = $vars['errors'] ?? [];
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
