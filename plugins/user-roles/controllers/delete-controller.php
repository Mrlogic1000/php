<?php   
 
    if ($row->id) {                     
            $user_role->delete($row->id);
            message('Record deleted successfully');
            // redirect($vars['admin_route'] . '/' . $vars['plugin_route']);       
           
    } else {
        set_value('errors', $user_role->errors);
    }
