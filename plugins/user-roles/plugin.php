<?php

/**
 * user roles
 * For managing roles
 */

set_value([
    "admin_route"   => "admin",
    "plugin_route"  => "user-roles",
    'tables' => [
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

//  set user permission for these plugin
add_filter('permissions', function ($permissions) {    
    $permissions[] = 'view_roles';
    $permissions[] = 'add_role';
    $permissions[] = 'edit_role';
    $permissions[] = 'delete_role';    

    return $permissions;
});

add_filter('user_permissions', function ($permissions) {
    $ses = new \Core\Session;
    if ($ses->is_logged_in()) {
        $vars = get_value();
        $db = new \Core\Database;
        $query = "select * from " . $vars['tables']['roles_table'];
        $roles = $db->query($query);

        if (is_array($roles)) 
        {

        } else {
            $permissions[] = 'all';
        }
    }
    $permissions[] = 'view_roles';
    $permissions[] = 'add_role';
    $permissions[] = 'edit_role';
    $permissions[] = 'delete_role';
    return $permissions;
});
//  set user permission for these plugin
add_filter('basic-admin_before_admin_links', function ($links) {
    $vars = get_value();

    $obj = (object)[];
    $obj->title = 'User Roles';
    $obj->link = ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route'];
    $obj->icon = 'fa-solid fa-unlock';
    $obj->parent = 0;
    $links[] = $obj;

    return $links;
});


add_action('controller', function () {
    $req = new \Core\Request;
    $vars = get_value();

    if (URL(1) == $vars['plugin_route'] && $req->posted()) {

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
    $users = new \UserRoles\User_role;
    $vars = get_value();
    $errors = $vars['errors'] ?? [];
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if (URL(1) == $vars['plugin_route']) {
        $id = URL(3) ?? null;
        if ($id)
            $row = $users->first(['id' => $id]);
        if (URL(2) == 'add') {
            require plugin_path('views/add-role.php');
        } else
        if (URL(2) == 'edit') {

            require plugin_path('views/edit-role.php');
        } else
        if (URL(2) == 'view') {
            // $rows = $users->findAll();            
            require plugin_path('views/view-role.php');
        } else
        if (URL(2) == 'delete') {
            require plugin_path('views/delete-role.php');
        } else {
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
