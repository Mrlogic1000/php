<?php
$postdata = $req->post() ?? '';
if (!empty($postdata)) {
    $found = false;
    if ($user_role->validate($postdata)) {
        $data = array_column($user_role->findAll(), 'role');
        if(!empty($data)){

            if (in_array($postdata['role'], $data)) {
                message('Record is already exist');
                $found = true;
            }
        }
        if (!$found) {
            $user_role->insert($postdata);
            message('Record created successfully');
            redirect($vars['admin_route'].'/'.$vars['plugin_route']);
            
        }
    } else {
        set_value('errors', $user_role->errors);
    }
}
