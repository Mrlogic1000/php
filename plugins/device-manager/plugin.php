<?php

/**
 * Plugin name
 * Descriptions
 */

 set_value([
    "plugin_route"=>"my_route",
    "table"=>"my_table",

 ]);

//  set user permission for these plugin
add_filter('permeissions',function($permissions){
    $permissions[] = 'my_permissions';
    return $permissions;

});


add_action('controller',function(){
    $var = get_value();
require plugin_path('controllers/controller.php');
});

// display the view files
add_action('view',function(){   
    $var = get_value();
require plugin_path('views/view.php');
});

// for manipulate data ater query operation
add_filter('after_query',function($data){

    if(empty($data['result']))
    return $data;

    foreach($data['result'] as $key=>$row){

    }

    return $data;

});