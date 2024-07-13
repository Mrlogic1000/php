<?php
use DeviceManager\Report;

if ($req->posted()) {
    
    $postdata = $req->post();
    


    $report = new Report;
    if ($report->validate($postdata)) {
        
        if ($postdata['form_id'] =='new') {
            $postdata['date_created'] = date('Y-m-d H:i:s');
            $postdata['category'] = 'network';
            $postdata['user_id'] = $ses->user('id');
            $report->insert($postdata);
            if ($report->affected_row > 0) {
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
           
                $row = $report->first(['id' => $postdata['id']]);
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
        $postdata['date_updated'] = date('Y-m-d H:i:s');
            $report->update($postdata['id'], $postdata);

            if ($report->affected_row > 0) {
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
       
            $report->delete($postdata['id']);
            if ($report->affected_row > 0) {
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
        echo json_encode($report->errors);
        
        die;
    }
}