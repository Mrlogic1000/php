<?php

/**
 * user manager
 * For managing users
 */

set_value([
    "admin_route"   => "admin",
    "plugin_route"  => "users",
    'tables' => [
        'users_table'               => 'users',
        
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
if(!$db->table_exists($tables)){
    dd('Missing database tables in '.plugin_id().' plugin : '. implode(',',$db->missing_table));
    die;
}

//  set user permission for these plugin

add_filter('permissions', function ($permissions) {
    $permissions[] = 'view_users';
    $permissions[] = 'view_user_detail';
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
        $obj->link = ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route'];
        $obj->icon = 'fa-solid fa-users';
        $obj->parent = 0;
        $links[] = $obj;
    
        return $links;
    });



add_action('controller', function () {
    $req = new \Core\Request;
    $vars = get_value();

    if ($req->posted() && URL(1) == $vars['plugin_route']) {

        $user = new \UserManager\User;       
        $id = URL(3) ?? null;

        if ($id)
            $row = $user->first(['id' => $id]);

        if (URL(2) == 'add') {
            require plugin_path('controllers/add-controller.php');
        } else
        if (URL(2) == 'edit') {          
            require plugin_path('controllers/edit-controller.php');
        } else
        if (URL(2) == 'delete') {          
            require plugin_path('controllers/delete-controller.php');
        }
    }
});

// display the view files
add_action('basic-admin_main_content', function () {
    $req = new \Core\Request;
    $users = new \UserManager\User;
    $vars = get_value();
    $errors = $vars['errors'] ?? [];   
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if (URL(1) == $vars['plugin_route']) {
        $id = URL(3) ?? null;
        if ($id)
           { 
            $users::$query_id = 'get-users';
            $row = $users->first(['id' => $id]);
        }
        if (URL(2) == 'add') {
            require plugin_path('views/add-view.php');
        } else
        if (URL(2) == 'edit') {           
            require plugin_path('views/edit-view.php');
        } else
        if (URL(2) == 'view') {
            require plugin_path('views/view-view.php');
        } else
        if (URL(2) == 'delete') {
            require plugin_path('views/delete-view.php');
        } else {
            $limit = 5;
            $pager = new \Core\Pager($limit);
            $offset = $pager->offset;
            $users->limit = $limit;
            $users->offset = $offset;
            $users::$query_id = 'get-users';
            if(!empty($_GET['find'])){
                $find = '%'. trim($_GET['find']) . '%';
                $query = "select * from users where (first_name like :find || last_name like :find) limit $limit offset $offset";
                $rows = $users->query($query,['find'=>$find]);
            }else{

                $rows = $users->findAll();
            }
            require plugin_path('views/list.php');
        }
    }
});

// for manipulate data ater query operation
add_filter('after_query', function ($data) {

    if (empty($data['result']))
        return $data;

        if($data['query_id']=='get-users'){

           
            
          
        }    
       
    return $data;
});
