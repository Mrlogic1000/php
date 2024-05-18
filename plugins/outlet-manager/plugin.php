<?php

/**
 * Plugin name
 * Descriptions
 */

 set_value([
    "admin_route"=>"admin",
    "plugin_route"=>"outlet",
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

//  set user permission for these plugin
add_filter('permissions', function ($permissions) {
    $permissions[] = 'view_outlets';
    $permissions[] = 'view_outlet_detail';
    $permissions[] = 'add_outlet';
    $permissions[] = 'edit_outlet';
    $permissions[] = 'delete_outlet';
return $permissions;
});

if(user_can('view_outlets')){
    add_filter('basic-admin_before_admin_links', function ($links) {
        $vars = get_value();
    
        $obj = (object)[];
        $obj->title = 'Outlets';
        $obj->link = ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route'];
        $obj->icon = 'fa-solid fa-users';
        $obj->parent = 0;
        $links[] = $obj;
    
        return $links;
    });
}

add_action('controller',function(){
    $vars = get_value();
    $req = new \Core\Request;
    $outlets = new \OutletManager\Outlet;
    if (URL(1) == $vars['plugin_route'] && $req->posted()) {
        $id = URL(3) ?? null;
        $outlet = $outlets->first(['id'=>$id]);
        if (URL(2) == 'add') {         
           
            require plugin_path('controllers/add-controller.php');
        } else
        if (URL(2) == 'edit') {        
           
            require plugin_path('controllers/edit-controller.php');
        } else
        if (URL(2) == 'view') {
            // $rows = $users->findAll();            
            require plugin_path('controllers/view-controller.php');
        } else
        if (URL(2) == 'delete') {
            require plugin_path('controllers/delete-controller.php');
        } 
    }

});

// display the view files

// display the view files
add_action('basic-admin_main_content', function () {   
    $outlets = new \OutletManager\Outlet;
    $vars = get_value();
    $errors = $vars['errors'] ?? [];   
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if (URL(1) == $vars['plugin_route']) {
        $id = URL(3) ?? null;
        if ($id)
           { 
           $outlet = $outlets->first(['id'=>$id]);           
        }
        $outlet = $outlets->first(['id'=>$id]);
        if (URL(2) == 'add') {
           
            require plugin_path('views/add-outlet.php');
        } else
        if (URL(2) == 'edit') {                
            require plugin_path('views/edit-outlet.php');
        } else
        if (URL(2) == 'view') {
            // $rows = $users->findAll();            
            require plugin_path('views/view-outlet.php');
        } else
        if (URL(2) == 'delete') {
            require plugin_path('views/delete-outlet.php');
        } else {
            // $limit = 5;
            // $pager = new \Core\Pager($limit);
            // $offset = $pager->offset;
            // $outlets->limit = $limit;
            // $outlets->offset = $offset;
            // $outletsManager::$query_id = 'get-users';
            if(!empty($_GET['find'])){
                $find = '%'. trim($_GET['find']) . '%';
                $query = "select * from users where (first_name like :find || last_name like :find) limit $limit offset $offset";
                $outlets = $outlets->query($query,['find'=>$find]);
            }else{

                $outlets = $outlets->findAll();
            }
            require plugin_path('views/outlets.php');
        }
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