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
        // $user->insert($postdata);
        if (!empty($postdata['image']) && file_exists($row->image)) {
            // unlink($row->image);

            $data = [];
foreach($postdata as $id=>$role_id){
    

    if(!strstr($role_id,"role_")){
        continue;
    }    
           
            $data[] = $role_id;
            dd($data);
            die;
           
        }
        
        $role_permission->query('update '. $vars['tables']['permissions_table'].' set disable=1');
        foreach($data as $id=>$permissions){
           
           
          
          foreach($permissions as $perm){           
                      
              $row = $role_permission->first(['role_id'=>$id,'permission'=>$perm]);              
              if($row){                 
                  $role_permission->update($row->id,['disable'=>0]);
              }else{
                
                  $role_permission->insert([
                      'role_id'=>$id,
                      'permission'=>$perm,
                      'disable'=>0,
              ]);
              
              }

          }
          
        }
        }
       

        message('Record updated successfully');
    } else {
        set_value('errors', array_merge($user->errors));
    }
}
