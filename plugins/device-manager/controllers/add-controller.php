<?php



if ($req->posted()) {

    $postdata = $req->post();

    if ($devices->validate($postdata)) {
        if ($postdata['form_id'] == 'save') {
            $devices->insert($postdata);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data inserted successfully 😀"
              ]);
              die;
            
        }else
        if($postdata['form_id'] == 'edit'){
            $device = $devices->first(['id'=>$postdata['id']]);
            echo json_encode($device);
            // echo json_encode("The data deleted successfully");
            die;


        }else
        if($postdata['form_id'] == 'delete'){
            $devices->delete($postdata['id']);
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data deleted successfully 😀"
              ]);
            die;


        }
    } else {
        echo json_encode([
            "statusCode" => 400,
            "errors" => $devices->errors
          ]);
        die;
        
       
    }
}else{
  
}


