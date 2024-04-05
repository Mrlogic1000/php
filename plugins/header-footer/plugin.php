<?php

/**
 * Plugin name
 * Descriptions
 */

 
 $db = new \Core\Database;
 
 
 
 
 add_action('before_view',function(){
    
     $links = [];
    
     $link = (object)[];    
     $link->id = 0;
     $link->title = 'Home';
     $link->slug = 'home';
     $link->image = '';
     $link->permission = '';
     
    
     $links[] = $link; 
    
     $links = do_filter(plugin_id().'_before_menu_links',$links);
    
    // $var = get_value();
require plugin_path('views/header.php');
});

// display the view files
add_action('after_view',function(){   
    
require plugin_path('views/footer.php');
});

// for manipulate data ater query operation
