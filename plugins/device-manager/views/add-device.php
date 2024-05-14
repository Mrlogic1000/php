
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
        <label for="name" class="form-label">Device Name</label>
        <input type="text" name="name" value="<?= old_value('name') ?>" class="form-control" placeholder="Device Name" aria-label="Username" aria-describedby="addon-wrapping">
      </div>
      
      <div class="col-md-6 mb-3">
        <label for="sn" class="form-label"> Seria Number</label>
        <input type="text" name="sn" value="<?= old_value('sn') ?>" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">
        
      </div>
      <div class="col-md-6 mb-3">
        <label for="IP" class="form-label"> IP</label>
        <input type="text" name="ip" value="<?= old_value('ip') ?>" class="form-control" placeholder="IP Address" aria-label="IP" aria-describedby="addon-wrapping">
        
      </div>
      <div class="col-md-6 mb-3">
        <label for="MAC" class="form-label">MAC</label>
        <input type="text" name="mac" value="<?= old_value('sn') ?>" class="form-control" placeholder="MAC Address" aria-label="MAC" aria-describedby="addon-wrapping">
        
      </div>
      <div class="col-md-6 mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="type" name="type" value="<?= old_value('type') ?>" class="form-control" placeholder="Type" aria-label="type" aria-describedby="addon-wrapping">
       
         
      </div>

      <div class="mb-3 col-md-6">
        <label for="gender" class="form-label">Status</label>
        <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
          
          <option <?= old_selected('status', 'good') ?> value="good">Good</option>
          <option <?= old_selected('status', 'bad') ?> value="faulty">Fauty</option>
        </select>
      </div>
      <div class="mb-3 ">
        <label for="install" class="form-label">Installation</label>
        <select name="installed" class="form-select form-select-sm mb-3" aria-label=".install">
         
          <option <?= old_selected('install', 'yes') ?> value="yes">Yes</option>
          <option <?= old_selected('install', 'no') ?> value="no">No</option>
        </select>
      </div>
      <div class="mb-3">
  <label for="comment" class="form-label">Comment</label>
  <textarea name="comment"  class="form-control" id="comment" rows="3">
  <?= old_value('comment') ?>
  </textarea>
</div>
    
     
      <div class="d-flex justify-content-between">
        <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
          <button type="button" class="btn btn-primary">
            <i class="fa-solid fa-chevron-left"></i>
            Back
          </button>
        </a>
        <button type="submit" class="btn btn-danger">
          <i class="fa-solid fa-save"></i>Save

        </button>
      </div>
    </form>
    

  </div>

