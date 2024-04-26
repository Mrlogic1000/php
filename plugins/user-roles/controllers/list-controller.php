<?php
$postdata = $req->post() ?? '';


$data = [];
foreach($postdata as $role_id=>$permission){
    

    if(!strstr($role_id,"check_")){
        continue;
    }
    
            $role_id = str_replace("check_","",$role_id);
            $role_id = preg_replace("/_[0-9]+$/","",$role_id);
            $data[$role_id][] = $permission;
           
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
      