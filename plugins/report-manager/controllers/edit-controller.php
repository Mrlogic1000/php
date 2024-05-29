<?php
// Controller
if($req->posted()){
    dd($report->id);
    die;
    $postdata = $req->post();
    $postdata['id'] = $report->id;
    $postdata['user_id'] = 1;
    $postdata['date_updated'] = date('y-m-d H:i:s');
   if($reportModel->validate($postdata)){
     $reportModel->update($postdata);
        message('The record inserted successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
   }
        
    
}