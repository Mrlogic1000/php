<?php
$postdata = $req->post() ?? '';

if (!empty($postdata)) {   

    $postdata['id'] = $row->id;
   
    if ($user_role->validate($postdata)) {                
            $user_role->update($postdata['id'],$postdata);
            message('Record created successfully');       
           
    } else {
        set_value('errors', $user_role->errors);
    }
}
