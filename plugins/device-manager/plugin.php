<?php

/**
 * Plugin name
 * Descriptions
 */

use DeviceManager\Device;
use DeviceManager\Outlet;
use DeviceManager\Vlan;
use DeviceManager\Report;
use DeviceManager\Software;

set_value([
    "admin_route" => "admin",
    "plugin_route"  => "network-devices",
    "table" => "my_table",

]);


add_filter('admin-manager_before_section_title', function ($title) {
    $vars = get_value();

    $title = 'Devices';

    return $title;
});

//  set user permission for these plugin
add_filter('permissions', function ($permissions) {
    $permissions[] = 'view_devices';
    $permissions[] = 'view_device_detail';
    $permissions[] = 'add_device';
    $permissions[] = 'edit_device';
    $permissions[] = 'delete_device';
    return $permissions;
});

if (user_can('view_users')) {
    add_filter('basic-admin_before_admin_links', function ($links) {
        $vars = get_value();
        $obj = (object)[];
        $obj->title = 'Network Devices';
        $obj->link = ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route'];
        $obj->icon = 'fa-solid fa-gauge';
        $obj->parent = 0;
        $links[] = $obj;
        return $links;
    });
}





add_action('controller', function () {
    $req = new \Core\Request;
    $id = URL(3) ?? '';
    $devices = new Device;
    $device = $devices->first(['id' => $id]);
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if ($req->posted() && URL(1) == $plugin_route) {
        if (URL(2) == 'device') {
            require plugin_path('controllers/ajax-controller.php');
            die;
        }else
        if(URL(3)=='software'){
            echo json_encode('connected');
    die;
            // require plugin_path('controllers/software-ajax-controller.php');
            // die;

        }
    }
});

// display the view files
add_action('basic-admin_main_content', function () {
    $devices = new Device;

    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    $errors = $vars['errors'] ?? [];

/** Device Ip managment */
    $vlans = new Vlan;
    $vlan = $vlans->first(['id'=>4]);
    $all_ip = [];
   
        $all_ip= getEachIpInRange("172.3.100.0/24");
    
  
//   Device Ip managment


    if (URL(1) == $plugin_route) {
        $id = URL(3) ?? '';

        $outletsModel = new Outlet;
        $outlets = $outletsModel->findAll();
        $device = $devices->first(['id' => $id]);
        $device_ip = $devices->findAll();
       
        $device_ip = array_column($device_ip, 'ip');
        
        $ip_remain = array_diff($all_ip, $device_ip ?? []);
       
        

       
        if (URL(2) == 'edit') {
            require plugin_path('views/edit-device.php');
        } else
        if (URL(2) == 'view') {
            $getReport = new Report;
            $reports = $getReport->where(['device_id'=>$id],['category'=>'other-device']);
            $getSoftware = new Software;
            $softwares = $getSoftware->where(['device_id'=>$id]);
            require plugin_path('views/view-device.php');
        } else {
            if (URL(2) !== 'ajax') {
                $vars = get_value();
            $devices::$query_id = 'get-device';
            $devices = $devices->findAll();
            $OutletManager = new Outlet;
            $outlets = $OutletManager->findAll();
            require plugin_path('views/device.php');
            
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

        foreach ($data['result'] as $key => $row) {
            $query = 'select * from install  where outlet_id in (select outlet_id from install where device_id = :device_id) limit 1';
            $install = $outlets->query($query,['device_id'=>$row->id]); 
            $install = array_column($install,'outlet_id');
            if($install){               
                $data['result'][$key]->install = $install;
            }
        }
        // dd($data);
    }

    return $data;
});
