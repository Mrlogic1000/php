<?php

/**
 * Home Page
 * For displaying all the content
 */

 


add_action('view',function(){   
 $result = do_filter(plugin_id().'_search_for_item',[]);
require plugin_path('views/home.php');
},2);
