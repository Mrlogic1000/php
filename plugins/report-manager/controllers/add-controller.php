<?php
// Controller
if($req->posted()){
    $postdata = $req->post();
    $postdata['comment'] = trim($postdata['comment'], " ");
    $postdata['user_id'] = 1;
    $postdata['date_created'] = date('y-m-d H:i:s');
   if($reportModel->validate($postdata)){
     $reportModel->insert($postdata);
        message('The record inserted successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
   }
        
    
}