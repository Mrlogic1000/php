<?php

/**
 * Plugin name
 * Descriptions
 */
use InstallManager\User;
use InstallManager\Device;
use InstallManager\Outlet;
use InstallManager\Install;

 set_value([
    "admin_route"=>"admin",
    "plugin_route"  => "installation",
    "table"=>"my_table",

 ]);
 

 add_filter('admin-manager_before_section_title',function($title){
    $vars = get_value();
    
        $title = 'Installation';

    return $title;
 });

//  set user permission for these plugin
add_filter('permissions',function($permissions){
    $permissions[] = 'view_installations';
    $permissions[] = 'view_installations_detail';
    $permissions[] = 'add_installations';
    $permissions[] = 'edit_installations';
    $permissions[] = 'delete_installations';
    return $permissions;
});

if(user_can('view_installationss')){
add_filter('basic-admin_before_admin_links',function($links){
    $vars = get_value();    
    $obj = (object)[];    
        $obj->title= 'Installations';
        $obj->link= ROOT.'/'.$vars['admin_route'].'/'.$vars['plugin_route'];
        $obj->icon= 'fa-solid fa-gauge';
        $obj->parent= 0;
        $links[] = $obj;
        return $links;
});

}
    
        



add_action('controller',function(){
    $req = new \Core\Request;
    $ses = new \Core\Session;
    $userId=$ses->user('id');
    $id = URL(3) ?? '';

    $installModel = new Install;
    $deviceModel = new Device; 
    $userModel = new User;
    $outletModel = new Outlet;    


    $outlets = $outletModel->findAll();        
    $installs = $installModel->findAll();
    $users = $userModel->findAll();
    $install = $installModel->first(['id'=>$id]);
    $devices = $deviceModel->findAll(); 

     
    $device = $deviceModel->first(['id'=>$id]);     
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
    $ses = new \Core\Session;
    $userId=$ses->user('id');
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];
    $errors = $vars['errors'] ?? []; 
         

    if(URL(1)== $plugin_route){  
        $id = URL(3) ?? '';
        $installModel = new Install;
        $deviceModel = new Device; 
        $userModel = new User;
        $devices = $deviceModel->findAll(); 
        $outletModel = new Outlet;  
        


        $outlets = $outletModel->findAll();        
        $installs = $installModel->findAll();
        $users = $userModel->findAll();
        $install = $installModel->first(['id'=>$id]);
        
        if(URL(2)=='add'){
            require plugin_path('views/add-install.php');
        }else
        if(URL(2)=='edit'){
           
            require plugin_path('views/edit-install.php');

        }else
        if(URL(2)=='delete'){
            require plugin_path('views/delete-install.php');


        }else
        if(URL(2)=='view'){
            require plugin_path('views/view-install.php');


        }
        
        else{
            
            $vars = get_value();                
            $installModel::$query_id = 'get-installed';
            $installs = $installModel->findAll();
                      
            require plugin_path('views/install.php');

        }
    
           
        }
    
});

// for manipulate data ater query operation
add_filter('after_query',function($data){

    if(empty($data['result'])){
    return $data;
}


if($data['query_id']=='get-installed'){
  
    $outlets = new Outlet;
    $devices = new Device;   
    $users = new User;   

    foreach($data['result'] as $key=>$row){
        $outlet = $outlets->first(['id'=>$row->outlet_id]);
        $data['result'][$key]->outlet = $outlet;

    }
    foreach($data['result'] as $key=>$row){
        $device =$devices->first(['id'=>$row->device_id]);
        $data['result'][$key]->device = $device;

    }
    foreach($data['result'] as $key=>$row){
        $installer =$users->first(['id'=>$row->user_id]);
        $data['result'][$key]->installer  = $installer ;

    }

    
}

    return $data;

});