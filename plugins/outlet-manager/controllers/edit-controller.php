<?php
// Controller
if($req->posted()){ 
    
    $postdata = $req->post();  
    $postdata['date_updated'] = date(date('Y-m-d H:i:s'));
    $postdata['id'] = $outlet->id;
    
   
   if($outlets->validate($postdata)){   
        $outlets->update($outlet->id,$postdata);
        message('The record updated successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
   }else{
    set_value('errors',$outlets->errors);
   }
   
        
    
}