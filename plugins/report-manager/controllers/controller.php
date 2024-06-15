<?php
// Controller
if($req->posted()){
    $postdata = $req->post();
   if($postdata['form_id'] == 'delete'){
    $reportModel->delete($postdata['id']);
      echo json_encode([
          "statusCode" => 200,
          "message" => "Data deleted successfully 😀",
          "form_id"=>$postdata['form_id']
        ]);
    


  }
        
    
}