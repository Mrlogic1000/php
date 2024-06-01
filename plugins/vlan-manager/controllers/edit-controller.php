<?php
// Controller
if($req->posted()){ 
    
    $postdata = $req->post();  
    $postdata['date_updated'] = date(date('Y-m-d H:i:s'));
    $postdata['id'] = $vlan->id;
    
   
   if($vlans->validate($postdata)){   
        $vlans->update($vlan->id,$postdata);
        message('The record updated successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
   }else{
    set_value('errors',$vlans->errors);
   }
   
        
    
}