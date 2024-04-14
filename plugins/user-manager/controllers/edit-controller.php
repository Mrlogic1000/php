<?php
if(empty($row)){
    $postdata = $req->post();
    $postdata['id'] = $row->id;
    if($user->validate($postdata))
    {
        if(isset($postdata['password']) && empty($postdata['password']))
            unset($postdata['password']);
        
        $postdata['date_updated'] = date('Y-m-d H:i:s');
        $user->update($postdata);
        message('Record updated successfully');
        

    }
    
}