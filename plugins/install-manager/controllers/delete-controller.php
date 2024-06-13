<?php
if($req->posted()){
   
   
        $installModel->delete($install->id);
        message('The record deleted successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
}