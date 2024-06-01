<?php

/**
 * Plugin name
 * Descriptions
 */

use DeviceManager\Device;
use OutletManager\Outlet;
use DeviceManager\Vlan;

 set_value([
    "admin_route"=>"admin",
    "plugin_route"  => "devices",
    "table"=>"my_table",

 ]);
 

 add_filter('admin-manager_before_section_title',function($title){
    $vars = get_value();
    
        $title = 'Network Devices';

    return $title;
 });

//  set user permission for these plugin
add_filter('permissions',function($permissions){
    $permissions[] = 'view_devices';
    $permissions[] = 'view_device_detail';
    $permissions[] = 'add_device';
    $permissions[] = 'edit_device';
    $permissions[] = 'delete_device';
    return $permissions;
});

if(user_can('view_users')){
add_filter('basic-admin_before_admin_links',function($links){
    $vars = get_value();    
    $obj = (object)[];    
        $obj->title= 'Network Devices';
        $obj->link= ROOT.'/'.$vars['admin_route'].'/'.$vars['plugin_route'];
        $obj->icon= 'fa-solid fa-gauge';
        $obj->parent= 0;
        $links[] = $obj;
        return $links;
});

}
    
        



add_action('controller',function(){
    $req = new \Core\Request;
    $id = URL(3) ?? '';
    $devices = new DeviceManager\Device;  
    $device = $devices->first(['id'=>$id]);     
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if($req->posted() && URL(1)== $plugin_route){
        if(URL(2)=='add'){
            require plugin_path('controllers/add-controller.php');
        }else
        if(URL(2)== 'edit'){
            require plugin_path('controllers/edit-controller.php');

        }else
        if(URL(2)== 'delete'){
            require plugin_path('controllers/delete-controller.php');


        }

    }

});

// display the view files
add_action('basic-admin_main_content', function () { 
    
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    $errors = $vars['errors'] ?? []; 

    $vlans = new Vlan;
    $vlan_ips = $vlans->findAll();

    $all_ip = [];

    foreach($vlan_ips as $key=>$vlan){
        
        $all_ip[$key] = getEachIpInRange("$vlan->ip/$vlan->cidr");
        
    }
         $all_ip = array_merge($all_ip[1],$all_ip[0]);
        //  dd($all_ip);

    if(URL(1)== $plugin_route){  
        $id = URL(3) ?? '';
        $devices = new DeviceManager\Device;
        $outlets = new OutletManager\Outlet;
        $outlet = $outlets->findAll();
        $device = $devices->first(['id'=>$id]);  
        
        if(URL(2)=='add'){
            require plugin_path('views/add-device.php');
        }else
        if(URL(2)=='edit'){
           
            require plugin_path('views/edit-device.php');

        }else
        if(URL(2)=='delete'){
            require plugin_path('views/delete-device.php');


        }else
        if(URL(2)=='view'){
            require plugin_path('views/view-device.php');


        }
        
        else{
            $vars = get_value();       
            $devices = new DeviceManager\Device;
            $devices::$query_id = 'get-device';
            $devices = $devices->findAll();           
            require plugin_path('views/device.php');

        }
    
           
        }
    
});

// for manipulate data ater query operation
add_filter('after_query',function($data){

    if(empty($data['result']))
    return $data;

if($data['query_id']=='get-device'){
    $outlets = new OutletManager\Outlet;   

    foreach($data['result'] as $key=>$row){
        $outlet = $outlets->first(['id'=>$row->id]);
        $data['result'][$key]->outlet = $outlet;

    }
    // dd($data);
}

    return $data;

});