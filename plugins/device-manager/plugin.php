<?php

/**
 * Plugin name
 * Descriptions
 */

 set_value([
    "admin_route"=>"property",
    "plugin_route"  => "devices",
    "table"=>"my_table",

 ]);

//  set user permission for these plugin
add_filter('permeissions',function($permissions){
    $permissions[] = 'my_permissions';
    return $permissions;

});
add_filter('property-manager_before_property_links',function($links){
    $vars = get_value();    
    $obj = (object)[];    
        $obj->title= 'Device';
        $obj->link= ROOT.'/'.$vars['admin_route'].'/'.$vars['plugin_route'];
        $obj->icon= 'fa-solid fa-gauge';
        $obj->parent= 0;
        $links[] = $obj;
        return $links;
});


add_action('controller',function(){
    $var = get_value();
require plugin_path('controllers/controller.php');
});

// display the view files
add_action('property-manager_main_content', function () {   
    if(URL(1)=='devices'){

        require plugin_path('views/device.php');
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