<?php

/**
 * Plugin name
 * Descriptions
 */

 

add_filter('home-page_search_for_item',function($result){   
   
   $obj = (object)[];
   $obj->id = 1;
   $obj->name ="mrlogic";

   $result = $obj;
return $result;
});


add_action('home-page_display_search_result',function($result){   
   
   foreach($result as $key=>$row){
      require plugin_path('views/card.php');
   }
return $result;
});

add_action('home-page_test', function($result){
echo '<h1>'.$result['test'].'</h1>';
});
