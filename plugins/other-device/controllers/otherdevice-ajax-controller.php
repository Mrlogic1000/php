<?php
use Otherdevice\Otherdevice;

if ($req->posted()) {
    
    $postdata = $req->post();
    


    $otherdevice = new Otherdevice;
    if ($otherdevice->validate($postdata)) {
        
        if ($postdata['form_id'] =='new') {
            $postdata['date_created'] = date('Y-m-d H:i:s');
            $otherdevice->insert($postdata);
            if ($otherdevice->affected_row > 0) {
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
           
                $row = $otherdevice->first(['id' => $postdata['id']]);
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
            $otherdevice->update($postdata['id'], $postdata);
            if ($otherdevice->affected_row > 0) {
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
       
            $otherdevice->delete($postdata['id']);
            if ($otherdevice->affected_row > 0) {
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
        echo json_encode($otherdevice->errors);
        die;
    }
}