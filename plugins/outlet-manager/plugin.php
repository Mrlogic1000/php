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


add_action('controller',function(){
    $vars = get_value();
    $req = new \Core\Request;
    $outlets = new \OutletManager\Outlet;
    $vars = get_value();
    if (URL(1) == $vars['plugin_route'] && $req->posted()) {
        $id = URL(3) ?? null;
        $outlet = $outlets->first(['id'=>$id]);
        if (URL(2) == $vars['plugin_route']) {
            require plugin_path('controllers/outlet-ajax-controller.php');
            die;
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
            $outlets::$query_id = 'get-outlets';
           $outlet = $outlets->first(['id'=>$id]);           
        }
        
        $limit = 5;
         $pager = new \Core\Pager($limit);
         $offset = $pager->offset;
         $outlets->limit = $limit;
         $outlets->offset = $offset;
         $outlets::$query_id = 'get-outlets';
         if(!empty($_GET['find'])){
             $find = '%'. trim($_GET['find']) . '%';
             $query = "select * from users where (first_name like :find || last_name like :find) limit $limit offset $offset";
             $outlets = $outlets->query($query,['find'=>$find]);
         }else{

             $outlets = $outlets->findAll();
         }
         require plugin_path('views/outlets.php');
       
    }
});

// for manipulate data ater query operation
add_filter('after_query',function($data){

    if(empty($data['result']))
    return $data;

    if($data['query_id']=='get-outlets'){
        $installs = new \OutletManager\Install;
        $outlets = new \OutletManager\Outlet;
        $devices = new \OutletManager\Device;
     

        
        foreach($data['result'] as $key=>$row){
            $query = 'select * from devices where id in (select device_id from install where outlet_id = :outlet_id)';
            $device = $outlets->query($query,['outlet_id'=>$row->id]);
            
            if($device){               
                $data['result'][$key]->device = $device;
            }      
        
    
        }
      
    }


    return $data;

});