<?php
// Controller
if($req->posted()){
    $postdata = $req->post();
    $postdata['description'] = trim($postdata['description'], " ");
   if($outlets->validate($postdata)){
        $outlets->insert($postdata);
        message('The record inserted successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
   }
        
    
}