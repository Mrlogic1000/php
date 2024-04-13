<?php if (!empty($row)) : ?>
  
  <div class="row mx-auto  ">
    <form class="row g3 col-md-5 mx-auto shadow p-3 " action="" method="post" enctype="multipart/form-data">
      <?= csrf() ?>
  <h4 class="my-3">Edit Record</h4>
  <label class="text-center">
    <img src="<?=get_image($row->image)?>" class="img-thumbnail my-3" style="cursor:pointer; height:100px; width: 100px; object-fit:cover" alt="">
    <input type="file" name="image" id="" class="d-none">
  </label>
    <div class="col-md-6 mb-3">
      <label for="first_name" class="form-label"> First Name</label>
      <input type="text" value="<?= old_value('first_name', $row->first_name) ?>" class="form-control" placeholder="First Name" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <div class="col-md-6 mb-3">
      <label for="last_name" class="form-label"> Last Name</label>
      <input type="text" value="<?= old_value('last_name', $row->last_name) ?>" class="form-control" placeholder="Last Name" aria-label="Last name" aria-describedby="addon-wrapping">
    </div>

    <div class="mb-3">
      <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
        <option selected>Open this select menu</option>
        <option <?= old_selected('gender', 'male', $row->gender) ?>>Male</option>
        <option <?= old_selected('gender', 'female', $row->gender) ?>>Female</option>
      </select>
    </div>
    <small class="text-danger">(leave password empty to keep the old password)</small>
    <div class="col-md-6 mb-3">
      <label for="password" class="form-label"> Password</label>
      <input type="password" value="<?= old_value('password', '') ?>" class="form-control" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping">
    </div>
    <div class="col-md-6 mb-3">
      <label for="retype-password" class="form-label">Retype Password</label>
      <input type="password" value="<?= old_value('retype-password', '') ?>" class="form-control" placeholder="Retype Password" aria-label="retype-password" aria-describedby="addon-wrapping">
    </div>
    <div class="d-flex justify-content-between">
      <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
        <button class="btn btn-primary">
          <i class="fa-solid fa-chevron-left"></i>
          Back
        </button>
      </a>
      <button class="btn btn-danger">
          <i class="fa-solid fa-save"></i>Save
         
        </button>
    </div>
    </form>

  </div>

<?php else : ?>
  <div class="alert alert-danger text-center">
    The record not found!
  </div>
  <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>?>">
    <button class="btn btn-primary">Back</button>
  </a>
<?php endif ?>