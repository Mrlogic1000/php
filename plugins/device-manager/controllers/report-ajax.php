<?php
use DeviceManager\Report;

if($req->posted())
{  

    $postdata = $req->post();


// REPORT CRUD


if ($form_id[1] == 'report') {
    $report = new Report;
    if ($report->validate($postdata)) {

        if ($postdata['form_id'] == 'new') {
            $user = new \Core\Session;
            $postdata['date_created'] = date('Y-m-d H:i:s');
            $postdata['user_id'] = $user->user('id');
            $postdata['category'] = 'network';
            $report->insert($postdata);
            if ($report->affected_row > 0) {
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "successful 😀",
                    "form_id" => $postdata['form_id'],

                ]);
            } else {
                echo json_encode([
                    "statusCode" => 400,
                    "message" => "Something went wrong 😀",
                    "form_id" => $postdata['form_id'],

                ]);
            }
            die;
        }
    }else{
        echo json_encode($report->errors);
    }
}
}