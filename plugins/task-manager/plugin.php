<?php

/**
 * Plugin name
 * Descriptions
 */
use InstallManager\User;
use ReportManager\Device;
// use InstallManager\Outlet;
use ReportManager\Report;

 set_value([
    "admin_route"=>"admin",
    "plugin_route"  => "task",
    "table"=>"task",

 ]);
 

 add_filter('admin-manager_before_section_title',function($title){
    $vars = get_value();    
        $title = 'Task';
    return $title;
 });

//  set user permission for these plugin
add_filter('permissions',function($permissions){
    $permissions[] = 'view_reports';
    $permissions[] = 'view_report_detail';
    $permissions[] = 'add_report';
    $permissions[] = 'edit_report';
    $permissions[] = 'delete_report';
    return $permissions;
});


add_filter('basic-admin_before_admin_links',function($links){
    $vars = get_value();    
    $obj = (object)[];    
        $obj->title= 'Task';
        $obj->link= ROOT.'/'.$vars['admin_route'].'/'.$vars['plugin_route'];
        $obj->icon= 'fa-solid fa-gauge';
        $obj->parent= 0;
        $links[] = $obj;
        return $links;
});

  
        



add_action('controller',function(){
    $req = new \Core\Request;
    $ses = new \Core\Session;
    $userId=$ses->user('id');
    $id = URL(3) ?? '';

   
     
    // $device = $deviceModel->first(['id'=>$id]);     
    $vars = get_value();
    $admin_route = $vars['admin_route'];
    $plugin_route = $vars['plugin_route'];

    if($req->posted() && URL(1)== $plugin_route){
        
        if(URL(2)== 'ajax'){
            require plugin_path('controllers/controller.php');
            die;


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
             
       
        if(URL(2)=='view'){
            require plugin_path('views/view-report.php');


        }
        
        else{
            
            $vars = get_value();                
            $reportModel::$query_id = 'get-report';
            $reports = $reportModel->findAll();
                      
            require plugin_path('views/reports.php');

        }
    
           
        }
    
});

// for manipulate data ater query operation
add_filter('after_query',function($data){

    if(empty($data['result'])){
    return $data;
}




    return $data;

});