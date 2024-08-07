<?php
use DeviceManager\Port;

if ($req->posted()) {
    
    $postdata = $req->post();
    


    $port = new Port;
    if ($port->validate($postdata)) {
        
        if ($postdata['form_id'] =='new') {       
            // echo json_encode("chekde");
            //     die;    
            $row = $port->first(['device_id'=>$postdata['device_id']]);
            
                if(($postdata['port'] == $row->port && $postdata['device_id'])==$row->device_id){

                    echo json_encode([
                        "statusCode" => 400,
                        "message" => "Port already exist 😀",
                        "form_id" => $postdata['form_id'],
    
                    ]);
                    die;
                }else{
                
                $postdata['date_created'] = date('Y-m-d H:i:s');
                $port->insert($postdata);
                if ($port->affected_row > 0) {
                    echo json_encode([
                        "statusCode" => 200,
                        "message" => "Created successful 😀",
                        "form_id" => $postdata['form_id'],
    
                    ]);
                    die;
                } else {
                    echo json_encode([
                        "statusCode" => 400,
                        "message" => "Something went wrong 😀",
                        "form_id" => $postdata['form_id'],
    
                    ]);
                    die;
                }
                die;
            }
           
        } else
        if ($postdata['form_id'] == 'row') {

            // echo json_encode($postdata);
            // die;
           
                $row = $port->first(['id' => $postdata['id']]);
                if ($row) {
                    echo json_encode([
                        "statusCode" => 200,
                        "message" => "successful 😀",
                        "data" => $row,
                        "form_id" => $postdata['form_id'],

                    ]);
                    die;
                }
        } else
    if ($postdata['form_id'] == 'update') {
            $port->update($postdata['id'], $postdata);
            if ($port->affected_row > 0) {
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "successful 😀",
                    "form_id" => $postdata['form_id'],

                ]);
                die;
            } else {
                echo json_encode([
                    "statusCode" => 400,
                    "message" => "Something went wrong 😀",
                    "form_id" => $postdata['form_id'],

                ]);
                die;
            }
        } else
    if ($postdata['form_id'] == 'delete') {
       
            $port->delete($postdata['id']);
            if ($port->affected_row > 0) {
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "successful 😀",
                    "form_id" => $postdata['form_id'],

                ]);
                die;
            } else {
                echo json_encode([
                    "statusCode" => 400,
                    "message" => "Something went wrong 😀",
                    "form_id" => $postdata['form_id'],

                ]);
                die;
            }
            die;
        }
    } else {
        echo json_encode($port->errors);
        die;
    }
}