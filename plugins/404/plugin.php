<?php

/**
 * Plugin name
 * Descriptions
 */

 
// add_action('view',function(){    
    
//     $result = do_filter(plugin_id().'_search_for_item',[]);

// });




add_action('view',function(){   
require plugin_path('views/view.php');
});


