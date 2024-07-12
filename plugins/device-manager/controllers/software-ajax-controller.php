<?php
use DeviceManager\Software;

if ($req->posted()) {
    
    $postdata = $req->post();
    


    $software = new Software;
    if ($software->validate($postdata)) {
        
        if ($postdata['form_id'] =='new') {
            $postdata['date_created'] = date('Y-m-d H:i:s');
            $software->insert($postdata);
            if ($software->affected_row > 0) {
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
        } else
        if ($postdata['form_id'] == 'row') {

            // echo json_encode($postdata);
            // die;
           
                $row = $software->first(['device_id' => $postdata['id']]);
                if ($row) {
                    echo json_encode([
                        "statusCode" => 200,
                        "message" => "successful 😀",
                        "data" => $row,
                        "form_id" => $postdata['form_id'],

                    ]);
                    die;
                }
                die;
        } else
    if ($postdata['form_id'] == 'update') {
            $software->update($postdata['id'], $postdata);
            if ($software->affected_row > 0) {
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
            $software->delete($postdata['id']);
            if ($software->affected_row > 0) {
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
        }
    } else {
        echo json_encode($software->errors);
        die;
    }
}