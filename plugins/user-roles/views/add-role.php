<?php if(user_can('edit_user')): ?>


  <div class="row mx-auto  ">
    <form  class="row g3 col-md-5 mx-auto shadow p-3 " method="post" >
      <!-- <?= csrf() ?> -->
      <h4 class="my-3">Edit Record</h4>
     
      
      <div class="col-md-6 mb-3">
        <label for="role" class="form-label"> Role</label>
        <input type="text" name="role" value="<?= old_value('role') ?>" class="form-control" placeholder="Role" aria-label="Username" aria-describedby="addon-wrapping">
        <?php if (!empty($errors)) : ?>
          <div class="text-center text-danger">
            <?= $errors['role'] ?>
          </div>
        <?php endif ?>
      </div>
     

      <div class="mb-3 col-md-6">
        <label for="disable" class="form-label"> Active</label>
        <select name="disable" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
          <option selected value="">Open this select menu</option>
          <option <?= old_selected('disable', '0') ?> value="0">Yes</option>
          <option <?= old_selected('disable', '1') ?> value="1">No</option>
        </select>
        <?php if (!empty($errors)) : ?>
        <div class="text-center text-danger">
          
        </div>
      <?php endif ?>
     
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


<?php else: ?>
    <div class="alert alert-danger text-center">
        Access denied! Please contact admin to view this page
    </div>

<?php endif ?>