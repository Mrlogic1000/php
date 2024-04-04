<link rel="stylesheet" href="<?=plugin_http_path('assets/css/style.css')?>">
<div style="padding:20px; max-width:800px; margin: auto; background:#F5F5F5;">
    <center><h3>This is Plugin</h3></center>    

    
    <?= do_action(plugin_id().'_display_search_result',['result'=>$result]) ?>
    <?php $res='This is working' ?>
    <?= message('',true); ?>

   
    <center style="max-width:400px"><img src="<?=plugin_path('assets/images/tech2.jpg')?>" alt=""></center>
</div>
<script src="<?=plugin_http_path('assets/js/plugin.js')?>"></script>