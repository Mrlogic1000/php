<?php
if (!empty($row)) {   
  
    $postdata = $req->post();
    $postdata['id'] = $row->id;
    $filedata = $req->files();   

    $file_ok = true;
    if (!empty($filedata)) {       
        $postdata['image'] = $req->upload_files('image');
    }

// dd($postdata);
// die;
    if (!empty($req->upload_errors)) {       
        $file_ok = false;        
        $user->errors['image'] = $req->upload_errors;
    }

    if (empty($filedata)) {
        unset($postdata['image']);
    }

    if ($file_ok && $user->validate($postdata)) {  

        if (isset($postdata['password']) && empty($postdata['password'])) {
            unset($postdata['password']);
        }

        $postdata['date_updated'] = date('Y-m-d H:i:s');
        $user->update($postdata['id'], $postdata);
        if (!empty($postdata['image']) && file_exists($row->image)) {
            unlink($row->image);
        }

        $data = [];
        $role_map = new \UserManager\User_roles_map;
        foreach ($postdata as $id => $role) {
            if (!strstr($id, "role_")) {             

                continue;
            }
            $data[] = $role;
        }
       

        $role_map->query('update ' . $vars['optional_table']['roles_map_table'] . ' set disable=1 where user_id = :user_id', ['user_id'=>$row->id]);       
        foreach ($data as $id => $role_id) {
            $row_data = $role_map->first(['role_id' => $role_id, 'user_id' => $row->id]);
            if ( $row_data) {
                // enable the permission
              
                $role_map->update($row->id, ['disable' => 0]);
            } else {
                // create the permission if permission
                $role_map->insert([
                    'role_id' => $role_id,
                    'user_id' => $row->id,
                    'disable' => 0,
                ]);
            }
        }

        message('Record updated successfully');
    } else {
        set_value('errors', array_merge($user->errors));
    }
   
}
