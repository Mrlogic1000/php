<?php
$user = new \BasicAuth\User;
$ses = new \Core\Session;
if(csrf_verify($req->post())){
    $postdata = $req->post();
    $row = $user->first(['email'=>$postdata['email']]);
   
      if($row){        
        if(password_verify($postdata['password'],$row->password)) 
         {
        dd('here');        

            $ses->auth($row);
            redirect($vars['home']);
        }

        message('Wrong email or password');   
    }   
}else{
    message("Form expired! Please refresh");
}