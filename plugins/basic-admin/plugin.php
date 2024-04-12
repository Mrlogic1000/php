    <?php

    /**
     * Plugin name
     * Descriptions
     */

    set_value([
        "plugin_route"=>"admin",
        "logout_page"=>"logout",
    

    ]);

    //  set user permission for these plugin
    add_filter('permeissions', function($permissions){
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
    
        $links = do_filter(plugin_id().'_before_admin_links',$links);

        $bottom_links = [];
        $obj = (object)[];    
            $obj->title= 'Website Home';
            $obj->link= ROOT;
            $obj->icon= 'fa-solid fa-earth-africa';
            $obj->parent= 0;
            $bottom_links[] = $obj;

            $obj = (object)[];
            $obj->title= 'Logout';
            $obj->link= ROOT.'/'.$vars['logout_page'];
            $obj->icon= 'fa-solid fa-right-from-bracket';
            $obj->parent= 0;
            $bottom_links[] = $obj;
         
    
    require plugin_path('views/view.php');
    });