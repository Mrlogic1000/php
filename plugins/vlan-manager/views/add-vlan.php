
<div class="row mx-auto  ">


    <form class="row g3 col-md-5 mx-auto shadow p-3 " method="post" >
      <?= csrf() ?>
      <h4 class="my-3">Add New Vlan</h4>
      <?php if(!empty($errors)): ?>
        <h6>Errors</h6>
      <?php foreach($errors as $error): ?>
        <div class="alert alert-danger">
        <?= $error ?>
        </div>
        <?php endforeach ?>
        <?php endif ?>
     
        <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Vlan ID</label>
        <input type="text" name="name" value="<?= old_value('name') ?>" class="form-control" placeholder="Name" aria-label="name" aria-describedby="addon-wrapping">

      </div>
      <div class="col-md-6 mb-3">
        <label for="cidr" class="form-label">Vlan ID</label>
        <select name="vlan_id" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">          
        <?php foreach(range(2,300) as $vlan_id): ?>          
          <option <?= old_selected('vlan_id', $vlan_id) ?> value="<?= $vlan_id?>"><?= $vlan_id?> </option>
        <?php endforeach ?>  
        </select>
        
      </div>
      
      <div class="mb-3 col-md-6">
        <label for="ip" class="form-label">IP</label>
        <input type="text" name="ip" value="<?= old_value('name') ?>" class="form-control" placeholder="IP Address" aria-label="ip" aria-describedby="addon-wrapping">

      </div>

      

      <div class="col-md-6 mb-3">
        <label for="cidr" class="form-label">CIDR</label>
        <select name="cidr" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">          
        <?php foreach(range(1,24) as $cidr): ?>          
          <option <?= old_selected('ip', $cidr) ?> value="<?= $cidr?>"><?= $cidr?> </option>
        <?php endforeach ?>  
        </select>
        
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

