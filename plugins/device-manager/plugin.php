<?php

/**
 * Plugin name
 * Descriptions
 */

use DeviceManager\Device;

 set_value([
    "admin_route"=>"asset",
    "plugin_route"  => "it",
    "table"=>"my_table",

 ]);
 

 add_filter('asset-manager_before_section_title',function($title){
    $vars = get_value();
    if(URL(1)==$vars['plugin_route'])
        $title = 'IT Page';

    return $title;
 });

//  set user permission for these plugin
add_filter('permeissions',function($permissions){
    $permissions[] = 'my_permissions';
    return $permissions;

});
add_filter('asset-manager_before_asset_links',function($links){
    $vars = get_value();    
    $obj = (object)[];    
        $obj->title= 'IT';
        $obj->link= ROOT.'/'.$vars['admin_route'].'/'.$vars['plugin_route'];
        $obj->icon= 'fa-solid fa-gauge';
        $obj->parent= 0;
        $links[] = $obj;
        return $links;
});


    
        



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


        }

    }

});

// display the view files
add_action('asset-manager_main_content', function () { 
    
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    $errors = $vars['errors'] ?? [];      

    if(URL(1)== $plugin_route){  
        $id = URL(3) ?? '';
        $devices = new DeviceManager\Device;
        
        if(URL(2)=='add'){
            require plugin_path('views/add-device.php');
        }else
        if(URL(2)=='edit'){
           
            $device = $devices->first(['id'=>$id]);  
            require plugin_path('views/edit-device.php');

        }else
        if(URL(2)=='delete'){

        }else
        if(URL(2)=='view'){
            $device = $devices->first(['id'=>$id]);  
            require plugin_path('views/view-device.php');


        }
        
        else{
            $vars = get_value();       
            $devices = new DeviceManager\Device;
            $devices = $devices->findAll();           
            require plugin_path('views/device.php');

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