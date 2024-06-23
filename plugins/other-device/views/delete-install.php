<form method="post">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Are you sure you want to delete <strong><?=esc($install->id)?></strong>?
    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
  
    <a  href="<?=ROOT.'/'.$vars['admin_route'].'/'.$vars['plugin_route'];?>" class="btn-close" ></a>
    
</div>
<button class="btn btn-danger" type="submit">Delete</button>
</form>