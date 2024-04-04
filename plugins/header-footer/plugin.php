<?php

/**
 * Plugin name
 * Descriptions
 */

 
 $db = new \Core\Database;




add_action('before_view',function(){
    // $var = get_value();
require plugin_path('views/header.php');
});

// display the view files
add_action('ater_view',function(){   
    
require plugin_path('views/footer.php');
});

// for manipulate data ater query operation
