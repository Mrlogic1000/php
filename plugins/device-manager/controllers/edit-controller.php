<?php

if(!empty($req->post()))
{   

    $postdata = $req->post();
    $postdata['id'] = $device->id;
   if( $devices->validate( $postdata)){
   $devices->update($device->id,$postdata);
   message("The data insertet successfully");
   }else{
    set_value('errors',$devices->errors);
   }
}