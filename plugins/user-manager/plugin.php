<?php

/**
 * user manager
 * For managing users
 */

set_value([
    "admin_route"   => "admin",
    "plugin_route"  => "users",
    'tables' => [
        'users_table'       => 'users',
        'roles_table'       => 'user_roles',
        'roles_map_table'   => 'user_roles_map',
    ]

]);

//  set user permission for these plugin
add_filter('permeissions', function ($permissions) {
    $permissions[] = 'view_users';
    $permissions[] = 'add_user';
    $permissions[] = 'edit_user';
    $permissions[] = 'delete_user';
    return $permissions;
});
//  set user permission for these plugin
add_filter('basic-admin_before_admin_links', function ($links) {
    $vars = get_value();

    $obj = (object)[];    
    $obj->title = 'Users';
    $obj->link = ROOT.'/'. $vars['admin_route'].'/'. $vars['plugin_route'];
    $obj->icon = 'fa-solid fa-users'; 
    $obj->parent = 0; 
    $links[] = $obj;

    return $links;
});


add_action('controller', function () {
    $req = new \Core\Request;
    $vars = get_value();
    if ($req->posted() && URL(1) == $vars['plugin_route']) 
            require plugin_path('controllers/controller.php');
    
});

// display the view files
add_action('basic-admin_main_content', function () {
    $req = new \Core\Request;
    $users = new \UserManager\User;
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    if (URL(1) == $vars['plugin_route'])
     {
        if(URL(2)=='add')
        {
            require plugin_path('views/add-view.php');
        }else
        if(URL(2)=='edit')
        {
            require plugin_path('views/edit-view.php');


        }else
        if(URL(2)=='view')
        {
            // $rows = $users->findAll();            
            require plugin_path('view/view-view.php');

        }else
        if(URL(2)=='delete'){
            require plugin_path('views/delete-view.php');

        }else{
            $rows = $users->findAll();            
            require plugin_path('views/list.php');
        }
    }
});

// for manipulate data ater query operation
add_filter('after_query', function ($data) {

    if (empty($data['result']))
        return $data;

    foreach ($data['result'] as $key => $row) {
    }

    return $data;
});
