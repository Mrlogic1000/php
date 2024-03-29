<?php


add_action('user_permissions',function($permissions){ 
    
    return $permissions;  
   
});
add_action('controller',function(){   
   
});
add_action('before_view',function(){
    require plugin_path('include/header.view.php');
});





add_action('after_view',function(){
    require plugin_path('include/footer.view.php');  
});