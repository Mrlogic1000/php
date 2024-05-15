<?php



if(!empty($req->post()))
{

    $postdata = $req->post();
   if( $devices->validate( $postdata)){
   $devices->insert($postdata);
   message("The data insertet successfully");
   redirect($admin_route.'/'.$plugin_route);
   }else{
    set_value('errors',$devices->errors);
   }
}