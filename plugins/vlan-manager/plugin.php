<?php

/**
 * Plugin name
 * Descriptions
 */

 set_value([
    "admin_route"=>"admin",
    "plugin_route"=>"ip",
    'tables' => [
        'users_table'               => 'ips',
        
    ],
    
 ]);

//  set user permission for these plugin
add_filter('permissions', function ($permissions) {
    $permissions[] = 'view_ips';
    $permissions[] = 'view_detail_ip';
    $permissions[] = 'add_ip';
    $permissions[] = 'edit_ip';
    $permissions[] = 'delete_ip';
return $permissions;
});


    add_filter('basic-admin_before_admin_links', function ($links) {
        $vars = get_value();
    
        $obj = (object)[];
        $obj->title = 'IP';
        $obj->link = ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route'];
        $obj->icon = 'fa-solid fa-users';
        $obj->parent = 0;
        $links[] = $obj;
    
        return $links;
    });


add_action('controller',function(){
    $vars = get_value();
    $req = new \Core\Request;
    $vlans = new \VlanManager\Vlan;
    if (URL(1) == $vars['plugin_route'] && $req->posted()) {
        $id = URL(3) ?? null;
        $vlan = $vlans->first(['id'=>$id]);
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
    $vlans = new \VlanManager\Vlan;
    $vars = get_value();
    $errors = $vars['errors'] ?? [];   
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if (URL(1) == $vars['plugin_route']) {
        $id = URL(3) ?? null;
        if ($id)
           { 
            $vlans::$query_id = 'get-outlets';
           $vlan = $vlans->first(['id'=>$id]);  
          

        }
        
        if (URL(2) == 'add') {
           
            require plugin_path('views/add-vlan.php');
        } else
        if (URL(2) == 'edit') {                
            require plugin_path('views/edit-vlan.php');
        } else
        if (URL(2) == 'view') {
            // $rows = $users->findAll();
            $devices = new \VlanManager\Device;
            $device = $devices->findAll();
            $device_ip = array_column($device,'ip');      
             
            require plugin_path('views/view-vlan.php');
        } else
        if (URL(2) == 'delete') {
            require plugin_path('views/delete-vlan.php');
        } else {
            // $limit = 5;
            // $pager = new \Core\Pager($limit);
            // $offset = $pager->offset;
            // $outlets->limit = $limit;
            // $outlets->offset = $offset;
            $vlans::$query_id = 'get-outlets';
            if(!empty($_GET['find'])){
                $find = '%'. trim($_GET['find']) . '%';
                $query = "select * from users where (first_name like :find || last_name like :find) limit $limit offset $offset";
                $vlans = $vlans->query($query,['find'=>$find]);
            }else{

                $vlans = $vlans->findAll();
            }
            require plugin_path('views/vlans.php');
        }
    }
});

// for manipulate data ater query operation
add_filter('after_query',function($data){

    if(empty($data['result']))
    return $data;

    if($data['query_id']=='get-outlets'){
        $vlans = new \VlanManager\Vlan;
        $devices = new \VlanManager\Device;
     

        
        foreach($data['result'] as $key=>$row){
            $query = 'select * from devices where id in (select device_id from install where outlet_id = :outlet_id)';
            $device = $vlans->query($query,['outlet_id'=>$row->id]);
            
            if($device){               
                $data['result'][$key]->device = $device;
            }      
        
    
        }
      
    }


    return $data;

});