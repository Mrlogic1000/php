<?php

/**
 * Plugin name
 * Descriptions
 */

set_value([
    "plugin_route"=>"asset",
    "logout_page"=>"logout",
    "admin_page"=>"admin",


]);

//  set user permission for these plugin
add_filter('permissions', function($permissions){
    $permissions[] = 'view_admin_page';   
    return $permissions;

});


add_action('before_controller',function(){
    $vars = get_value();
    if(false && page() == $vars['plugin_route'] && !user_can('view_admin_page')){
        message('Access denied! Contact admin');
        redirect('login');

    }
    
});
add_action('controller',function(){
    do_action(plugin_id().'_controller');
    
});

// display the view files
add_action('view',function(){  
    $vars = get_value();
    $section_title = ucfirst(str_replace("_","",(URL(1)??'')));
    
    if(empty($section_title))
        $section_title = "Dashboard"; 
    $section_title = do_filter(plugin_id().'_before_section_title',$section_title);

    $links = [];
    $obj = (object)[];    
        $obj->title= 'Dashboard';
        $obj->link= ROOT.'/'.$vars['plugin_route'];
        $obj->icon= 'fa-solid fa-gauge';
        $obj->parent= 0;
        $links[] = $obj;


       
        $sub_links = null; 
       
        $sub_links = do_filter(plugin_id().'_before_sub_links', $sub_links);
      

    // side bar menu links

    $links = do_filter(plugin_id().'_before_asset_links',$links);

    $top_links = [];
    $obj = (object)[];    
        $obj->title= 'Website Home';
        $obj->link= ROOT;
        $obj->icon= '';
        $obj->parent= 0;
        $top_links[] = $obj;

       
        
        $obj = (object)[];
        $obj->title= 'Admin';
        $obj->link= ROOT.'/'.$vars['admin_page'];
        $obj->icon= '';
        $obj->parent= 0;
        $top_links[] = $obj;

        $obj = (object)[];
        $obj->title= 'Logout';
        $obj->link= ROOT.'/'.$vars['logout_page'];
        $obj->icon= '';
        $obj->parent= 0;
        $top_links[] = $obj;

require plugin_path('views/view.php');
});