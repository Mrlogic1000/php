<?php
use TaskManager\Task;

if ($req->posted()) {
    
    $postdata = $req->post();
    


    $task = new Task;
    if ($task->validate($postdata)) {
        
        if ($postdata['form_id'] =='new') {
           
            $postdata['date_created'] = date('Y-m-d H:i:s');
            $task->insert($postdata);
            if ($task->affected_row > 0) {
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "Created successful 😀",
                    "form_id" => $postdata['form_id'],

                ]);
                die;
            } else {
                echo json_encode([
                    "statusCode" => 400,
                    "message" => $task->errors,
                    "form_id" => $postdata['form_id'],

                ]);
                die;
            }
            die;
        } else
        if ($postdata['form_id'] == 'row') {

            // echo json_encode($postdata);
            // die;
           
                $row = $task->first(['id' => $postdata['id']]);
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
            $task->update($postdata['id'], $postdata);
            if ($task->affected_row > 0) {
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
       
            $task->delete($postdata['id']);
            if ($task->affected_row > 0) {
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
        echo json_encode($task->errors);
        die;
    }
}