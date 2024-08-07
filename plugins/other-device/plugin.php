<?php

/**
 * Plugin name
 * Descriptions
 */

use InstallManager\User;
use InstallManager\Device;
use OtherDevice\Outlet;
use OtherDevice\Otherdevice;
use OtherDevice\Report;
use InstallManager\Vlan;

set_value([
    "admin_route" => "admin",
    "plugin_route"  => "otherdevice",
    "table" => "other_device",

]);


add_filter('admin-manager_before_section_title', function ($title) {
    $vars = get_value();
    $title = 'Other Device';

    return $title;
});

//  set user permission for these plugin
// add_filter('permissions', function ($permissions) {
//     $permissions[] = 'view_device';
//     $permissions[] = 'view_device_detail';
//     $permissions[] = 'add_device';
//     $permissions[] = 'edit_device';
//     $permissions[] = 'delete_device';
//     return $permissions;
// });


    add_filter('basic-admin_before_admin_links', function ($links) {
        $vars = get_value();
        $obj = (object)[];
        $obj->title = 'Other Device';
        $obj->link = ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route'];
        $obj->icon = 'fa-solid fa-gauge';
        $obj->parent = 0;
        $links[] = $obj;
        return $links;
    });





add_action('controller', function () {
    $req = new \Core\Request;
    $ses = new \Core\Session;
    $userId = $ses->user('id');
    $id = URL(3) ?? '';

    $otherDevice = new Otherdevice; 

   
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    
    if ($req->posted() && URL(1) == $plugin_route) {
        if (URL(2) == 'otherdevice') {
            require plugin_path('controllers/otherdevice-ajax-controller.php');
            die;
        } 
    }
    
});

// display the view files
add_action('basic-admin_main_content', function () {
    $ses = new \Core\Session;
    $userId = $ses->user('id');
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    $errors = $vars['errors'] ?? [];


    if (URL(1) == $plugin_route) {
        $id = URL(3) ?? '';
        $otherDevice = new Otherdevice;
       
        $userModel = new User;

        $devices = $otherDevice->findAll();
        $users = $userModel->findAll();

        $otherDevice::$query_id = 'other-device';
        $device = $otherDevice->first(['id' => $id]);    
       
        
       
        if (URL(2) == 'add') {
            require plugin_path('views/add-Odevice.php');
        } else
        if (URL(2) == 'edit') {

            require plugin_path('views/edit-Odevice.php');
        } else
        if (URL(2) == 'delete') {
            require plugin_path('views/delete-Odevice.php');
        } else
        if (URL(2) == 'view') {
            $device = $otherDevice->first(['id'=>$id]);
            $getReport = new Report;
            $reports = $getReport->where(['device_id'=>$id],['category'=>'network']);
            require plugin_path('views/view-otherdevice.php');
        } else {
            if (URL(2) !== 'ajax') {
                $vars = get_value();
                $otherDevice::$query_id = 'get-installed';
                $devices = $otherDevice->findAll();
                $outletDB = new Outlet;
                $outlets = $outletDB->findAll();
    
                require plugin_path('views/otherdevice.php');
            }

           
        }
    }
});

// for manipulate data ater query operation
add_filter('after_query', function ($data) {

    if (empty($data['result'])) {
        return $data;
    }


    if ($data['query_id'] == 'other-device') {

        
        $users = new User;
       

        
    }
    return $data;

});
