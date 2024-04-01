<?php
add_action('view',function(){
dd("This is from hook in home page plugin");
});

add_action('controller',function(){
dd("This is from hook in home page plugin");
});
