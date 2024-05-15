
<div class="row mx-auto  ">
<?php if(!empty($errors)): ?>
    
<?php foreach($errors as $error): ?>
  <div class="alert alert-success">
    <?= $error ?>
    </div>
  <?php endforeach ?>
  <?php endif ?>


    <form class="row g3 col-md-5 mx-auto shadow p-3 " method="post" >
      <?= csrf() ?>
      <h4 class="my-3">Add New Device</h4>
      <?php if(!empty($errors)): ?>
        <h6>Errors</h6>
      <?php foreach($errors as $error): ?>
        <div class="text-danger">
        <?= $error ?>
        </div>
        <?php endforeach ?>
        <?php endif ?>
     
      <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Outlet Name</label>
        <input type="text" name="name" value="<?= old_value('name') ?>" class="form-control" placeholder="Outlet Name" aria-label="Username" aria-describedby="addon-wrapping">
      </div>
      
      

      
      <div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea name="description"  class="form-control" id="description" rows="3">
  <?= old_value('description') ?>
  </textarea>
</div>
    
     
      <div class="d-flex justify-content-between">
        <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
          <button type="button" class="btn btn-warning">
            <i class="fa-solid fa-chevron-left"></i>
            Back
          </button>
        </a>
        <button type="submit" class="btn btn-primary">
          <i class="fa-solid fa-save"></i>Save

        </button>
      </div>
    </form>
    

  </div>

