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


        $data = [];
        $role_map = new \UserManager\User_roles_map;
foreach($postdata as $id=>$role){   
    if(!strstr($id,"role_")){
        continue;
    }           
            $data[] = $role;
           
        }
        
        $role_map->query('update '. $vars['tables']['permissions_table'].' set disable=1');
        foreach($data as $id=>$role_id){                   
                      
              $row = $role_map->first(['role_id'=>$id,'permission'=>$perm]);              
              if($row){                 
                  $$role_map->update($row->id,['disable'=>0]);
              }else{
                
                $role_map->insert([
                      'role_id'=>$role_id,
                      'permission'=>$row->id,
                      'disable'=>0,
              ]);
              
              

          }
          
        }       

        message('Record updated successfully');
       
    } else {
        set_value('errors',array_merge($user->errors));       
        
    }
}
