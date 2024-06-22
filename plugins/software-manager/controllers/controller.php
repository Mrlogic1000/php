<?php



if (!empty($req->post())) {

    echo "The ajax connected successfully";
    die;

    $postdata = $req->post();
    if ($devices->validate($postdata)) {        
        $devices->insert($postdata);
        message("The data inserted successfully");
        redirect($admin_route . '/' . $plugin_route);
    } else {
        set_value('errors', $devices->errors);
    }
}
