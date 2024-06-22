<?php
if($req->posted())
{  

if(!empty($device->id == $id))
{   

    $postdata = $req->post();
   
   $devices->delete($device->id);
   message("The data delete successfully");
   redirect($admin_route.'/'.$plugin_route);
  
}else{
    message("The record could not found");
}
}