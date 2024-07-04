<?php

/**
 * Plugin name
 * Descriptions
 */

use SoftwareManager\Device;
use SoftwareManager\Software;

set_value([
    "admin_route" => "admin",
    "plugin_route"  => "software",
    "table" => "my_table",

]);


add_filter('admin-manager_before_section_title', function ($title) {
    $vars = get_value();

    $title = 'Software';

    return $title;
});

//  set user permission for these plugin
add_filter('permissions', function ($permissions) {
    $permissions[] = 'view_softwares';
    $permissions[] = 'view_software_detail';
    $permissions[] = 'add_software';
    $permissions[] = 'edit_software';
    $permissions[] = 'delete_software';
    return $permissions;
});


    add_filter('basic-admin_before_admin_links', function ($links) {
        $vars = get_value();
        $obj = (object)[];
        $obj->title = 'Software';
        $obj->link = ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route'];
        $obj->icon = 'fa-solid fa-gauge';
        $obj->parent = 0;
        $links[] = $obj;
        return $links;
    });






add_action('controller', function () {
    $req = new \Core\Request;
    $id = URL(3) ?? '';
    $softwares = new Software;
    $software = $softwares->first(['id' => $id]);
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if ($req->posted() && URL(1) == $plugin_route) {
        if (URL(2) == 'ajax') {
            require plugin_path('controllers/ajax-controller.php');
            die;
        } 
    }
});

// display the view files
add_action('basic-admin_main_content', function () {
    $softwares = new Software;
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    $errors = $vars['errors'] ?? [];

/** Device Ip managment */
   


    if (URL(1) == $plugin_route) {
        $id = URL(3) ?? '';     
        
        $software = $softwares->first(['id' => $id]);
       
       
       
       
        

       
        if (URL(2) == 'edit') {
            require plugin_path('views/edit-device.php');
        } else
        if (URL(2) == 'view') {
            require plugin_path('views/view-device.php');
        } else {
            if (URL(2) !== 'ajax') {
                $vars = get_value();
            $softwares::$query_id = 'get-software';
            $softwares = $softwares->findAll();           
            require plugin_path('views/softwares.php');
            
            }
           
        }
    }
});

// for manipulate data ater query operation
add_filter('after_query', function ($data) {

    if (empty($data['result']))
        return $data;

    if ($data['query_id'] == 'get-device') {
        $outlets = new OutletManager\Outlet;

        // foreach ($data['result'] as $key => $row) {
        //     $query = 'select * from install  where outlet_id in (select outlet_id from install where device_id = :device_id) limit 1';
        //     $install = $outlets->query($query,['device_id'=>$row->id]); 
        //     $install = array_column($install,'outlet_id');
        //     if($install){               
        //         $data['result'][$key]->install = $install;
        //     }
        // }
        // dd($data);
    }

    return $data;
});
