<?php



if ($req->posted()) {
    $otherDevice = new \Otherdevice\Otherdevice;

    $postdata = $req->post();

  
    if ( $otherDevice->validate($postdata)) {
        if ($postdata['form_id'] == 'new') {
            $postdata['date_created'] = date('Y-M-D H:i:s');          
            
            $otherDevice->insert($postdata);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data inserted successfully 😀",
                "form_id"=>$postdata['form_id']
              ]);
              die;
            
            
        }else
        if($postdata['form_id'] == 'row'){
            $device = $otherDevice->first(['id'=>$postdata['id']]);
            echo json_encode([
                'statusCode'=>200,
                'row'=>$device,
                "form_id"=>$postdata['form_id']
            ]);
            die;


        }else
        if($postdata['form_id'] == 'delete'){           
            $otherDevice->delete($postdata['id']);           
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data deleted successfully 😀",
                "form_id"=>$postdata['form_id']
              ]);
            die;


        }else
        if($postdata['form_id'] == 'edit'){
            $otherDevice->update($postdata['id'],$postdata);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data updated successfully 😀",
                "form_id"=>$postdata['form_id'],
                
              ]);
            die;


        }else
        if($postdata['form_id'] == 'report-new'){            
            $user = new \Core\Session;
            $report = new \OtherDevice\Report;
            $postdata['date_created'] = date('Y-m-d H:i:s');
            $postdata['user_id'] = $user->user('id');
            $postdata['category'] = 'other-device';
            $report->insert($postdata);
            if($report->affected_row > 0){
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "successful 😀",
                    "form_id"=>$postdata['form_id'],
                    
                  ]);
            }else{
                echo json_encode([
                    "statusCode" => 400,
                    "message" => "Something went wrong 😀",
                    "form_id"=>$postdata['form_id'],
                    
                  ]);
            }
            die;
    
    
        }
    } 
    
    else {
        foreach($otherDevice->errors as $key=>$error){
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


