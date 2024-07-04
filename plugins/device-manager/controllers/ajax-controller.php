<?php

use DeviceManager\Device;

if ($req->posted()) {

    $postdata = $req->post();   
    
        $devices = new Device;
        if ($devices->validate($postdata)) {

            if ($postdata['form_id'] == 'new') {
                $devices->insert($postdata);
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "Data inserted successfully 😀",
                    "form_id" => $postdata['form_id']
                ]);
                die;
            } 

            if ($postdata['form_id'] == 'row') {
                $device = $devices->first(['id' => $postdata['id']]);
                echo json_encode([
                    'statusCode' => 200,
                    'row' => $device,
                    "form_id" => $postdata['form_id']
                ]);
                // echo json_encode("The data deleted successfully");
                die;
            }
            if ($postdata['form_id'] == 'update') {
                $postdata['date_updated'] = date('Y-M-D H:s:i');
                $postdata['status'] = (int)$postdata['status'];
                $devices->update($postdata['id'], $postdata);
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "Data updated successfully 😀",
                    "form_id" => $postdata['form_id'],
                    "form_id" => $postdata['form_id'],

                ]);
                die;
            }
            if ($postdata['form_id'] == 'delete') {
                $install = new DeviceManager\Install;
                $install_device = $install->first(['device_id' => $postdata['id']]);
                if ($install_device) {
                    $install->delete($install_device->id);
                }
                $devices->delete($postdata['id']);
                echo json_encode([
                    "statusCode" => 200,
                    "message" => "Data deleted successfully 😀",
                    "form_id" => $postdata['form_id']
                ]);
                die;
            }
        }else{
            echo json_encode($devices->errors);
        }
    



    // END OF DEVICE CRUD
    




    // END OF REPORT CRUD


    
}
