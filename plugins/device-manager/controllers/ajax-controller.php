<?php



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
            $devices->delete($postdata['id']);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data deleted successfully 😀",
                "form_id"=>$postdata['form_id']
              ]);
            die;


        }else
        if($postdata['form_id'] == 'edit'){
            $devices->update($postdata['id'],$postdata);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data updated successfully 😀",
                "form_id"=>$postdata['form_id'],
                
              ]);
            die;


        }
    } else {
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


