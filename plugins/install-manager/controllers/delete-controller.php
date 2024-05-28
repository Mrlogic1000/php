<?php
if($req->posted()){
    if($install->id){
        $installModel->delete($install->id);
        message('The record deleted successfully');
        redirect($vars['admin_route'].'/'.$vars['plugin_route']);
    }else{
        message("The message could not found");
    }
}