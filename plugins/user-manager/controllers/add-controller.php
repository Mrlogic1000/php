<?php

$postdata = $req->post();

// foreach($postdata as $id=>$role_id){
    

//     if(!strstr($id,"role_")){
//         continue;
//     }    
           
//             $data[] = $role_id;
           
            
           
//         }
//         dd($data);
//         die;
if (!empty($postdata)) {
   

    $filedata = $req->files();
    $file_ok = true;
    if (!empty($filedata)) {
        // $postdata['image'] = $req->upload_files('image');
    }
    if (empty($filedata)) {
        unset($postdata['image']);
    }
    if (!empty($req->upload_errors)) {
        $file_ok = false;
    }

    if ($postdata['password'] !== $postdata['retype-password']) {
        message('The password is not equal');
        $file_ok = false;
    } 


    if ($file_ok && $user->validate($postdata)) {        
        $postdata['password'] = password_hash($postdata['password'], PASSWORD_DEFAULT);
        $postdata['date_created'] = date('Y-m-d H:i:s');
        $user->insert($postdata);

        if (!empty($postdata['image']) && file_exists($row->image)) {
            unlink($row->image);
        }

            $data = [];
            $role_map = new \UserManager\User_roles_map;
            foreach($postdata as $id=>$role){   

                if(!strstr($id,"role_")){
                    continue;
                }               
                        $data[] = $role;                    
                    
                    }
                    dd($data);
                    foreach($data as $id=>$role_id){            
                           
                        $role_map->insert([
                                'role_id'=>$role_id,
                                'user_id'=>$user->inserted_id,
                                'disable'=>0,
                        ]);
                        
                        

                    
                    
                    }
        
       dd($role_map->sql_error);

        message('Record updated successfully');
    } else {
        set_value('errors', array_merge($user->errors));
    }
}
