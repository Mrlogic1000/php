<?php
if (!empty($row)) {
    $postdata = $req->post();
    $postdata['id'] = $row->id;
    $filedata = $req->files();
    
    $file_ok = true;
    if(!empty($filedata)){
        
        $postdata['image'] = $req->upload_files('image');
       
    }
    if(!empty($req->upload_errors)){
        $file_ok = false;
    }


    if ($file_ok && $user->validate($postdata)) 
    {

        if (isset($postdata['password']) && empty($postdata['password'])) {
            unset($postdata['password']);           
        }
        
        $postdata['date_updated'] = date('Y-m-d H:i:s');
       
        $user->update($postdata['id'], $postdata);
        if (!empty($postdata['image']) && file_exists($row->image)) {
            unlink($row->image);
        }        

        message('Record updated successfully');
       
    } else {
        set_value('errors',array_merge($user->errors));       
        
    }
}
