<?php
// Controller
if($req->posted()){
    $postdata = $req->post();
   if($vlans->validate($postdata)){
        $vlans->insert($postdata);
        message('The record inserted successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
   }else{
     set_value('errors',$vlans->errors);
   }
        
    
}