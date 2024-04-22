<?php
$postdata = $req->post() ?? '';
dd($postdata);
$data = [];
foreach($postdata as $key=>$perm){

    if(!strstr($key,"check_")){
        continue;
    }
    
            $key = str_replace("check_","",$key);
            $key = preg_replace("/_[0-9]+$/","",$key);
            $data[$key][] = $perm;
            
        }
        $user_role->query('update '. $vars['tables']['permissions_table'].' set disable=1');
        foreach($user_role as $id=>$permission){
            $row = $role_permission->first(['role_id'=>$id,'permission'=>$permission]);
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
        dd($data);
die;