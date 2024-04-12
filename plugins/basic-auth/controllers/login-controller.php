<?php
$user = new \BasicAuth\User;

if(csrf_verify($req->post())){
    $postdata = $req->post();
    if(!empty($postdata['email']) && !empty($postdata['password'])){

        $row = $user->first(['email'=>$postdata['email']]);
       
          if($row){        
            if(password_verify($postdata['password'],$row->password)) 
             {     
    
                $ses->auth($row);
                redirect($vars['home']);
            }
    
            message('Wrong email or password');   
        }   
    }else{
        message('Email or password cannot be emptied');
    }
}else{
    message("Form expired! Please refresh");
}