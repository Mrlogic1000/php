<?php
if ($req->posted()) {
   
    $postdata = $req->post();
    if ($installModel->validate($postdata)) {
        $postdata['date_created'] = date('Y-m-d H:i:s');
        $postdata['user_id'] = $userId;      
        $row = $installModel->first(['device_id' => $postdata['device_id']]);
        if ($row) {    
           
            message("The record with id $row->device_id has already been installed");
        } else {
            $installModel->insert($postdata);         
            message('New record inserted successfully');
        }
    } else {
        set_value('errors', $installModel->errors);
    }
    dd($installModel->sql_error);
}
