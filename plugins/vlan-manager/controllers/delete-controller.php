<?php
// Controller
if($req->posted()){ 
      if($outlet->id == $id){

          $outlets->delete($outlet->id);
          message('The record deleted successfully');
          redirect($vars['admin_route'].'/'.$vars['plugin_route']);
      }
  
   
        
    
}