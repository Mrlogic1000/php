<?php

use DeviceManager\Device;
use DeviceManager\Install;

if ($req->posted()) {

    $postdata = $req->post();

    if ($devices->validate($postdata)) {
        if ($postdata['form_id'] == 'save') {
            $devices->insert($postdata);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data inserted successfully 😀",
                "form_id"=>$postdata['form_id']
              ]);
            
            
        }else
        if($postdata['form_id'] == 'row'){
            $device = $devices->first(['id'=>$postdata['id']]);
            echo json_encode([
                'statusCode'=>200,
                'row'=>$device,
                "form_id"=>$postdata['form_id']
            ]);
            // echo json_encode("The data deleted successfully");
            die;


        }else
        if($postdata['form_id'] == 'delete'){
            $install = new DeviceManager\Install;
            $install_device = $install->first(['device_id'=>$postdata['id']]);
            if($install_device){
                $install->delete($install_device->id);
            }
            $devices->delete($postdata['id']);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data deleted successfully 😀",
                "form_id"=>$postdata['form_id']
              ]);
            die;


        }else
        if($postdata['form_id'] == 'edit'){
            $postdata['date_updated'] = date('Y-M-D H:s:i');
            $postdata['status'] = (int)$postdata['status'];
            $devices->update($postdata['id'],$postdata);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data updated successfully 😀",
                "form_id"=>$postdata['form_id'],
                "form_id"=>$postdata['form_id'],
                
              ]);
            die;


        }else
        if($postdata['form_id'] == 'install'){
            $install = new DeviceManager\Install; 
            if($postdata['outlet_id']==0){
                $install->delete($postdata['device_id'],'device_id');
            } else{
                $install_device = $install->first(['device_id'=>$postdata['device_id']]);                        
               if($install_device){
                $install->update($install_device->id,$postdata);
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "Data updated successfully 😀",
                    "form_id"=>$install_device,
                    
                  ]);
               }else{
                $ses = new \Core\Session;
                $userId = $ses->user('id');
                $postdata['user_id'] = $userId;
                $install->insert($postdata);
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "Data updated successfully 😀",
                    "form_id"=>$install_device,
                    
                  ]);
               }
            }         

           
            die;

        }
    } 
    else {
        foreach($devices->errors as $key=>$error){
            echo json_encode([
                "statusCode" => 400,
                "errors" => $error
              ]);
              break;
              
              }
            die;
        
       
    }
}else{
  
}


