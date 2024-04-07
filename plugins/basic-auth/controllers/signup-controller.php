<?php
$user = new \BasicAuth\User;
if($user->validate($req->post())){
    $postdata = $req->post();
    $postdata['date_created'] = date("Y-m-d H:i:s");
    $postdata['password'] = password_hash($postdata['password'],PASSWORD_DEFAULT);

    $user->insert($postdata);
    message('SignUp completed ! Please login to continue');
    print_r(message());
    redirect($vars['login_page']);
}else{
    set_value('errors',$user->errors);
}

