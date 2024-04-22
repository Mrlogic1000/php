<?php if(user_can('edit_user')): ?>
<?php if (!empty($row)) : ?>

  <div class="row mx-auto  ">
    <form onsubmit="submit_forms(event)" class="row g3 col-md-5 mx-auto shadow p-3 " method="post" enctype="multipart/form-data">
      <?= csrf() ?>
      <h4 class="my-3">Edit Record</h4>
      <label class="text-center">
        <img src="<?= get_image($row->image) ?>" class="img img-thumbnail my-3" style="cursor:pointer; height:100px; width: 100px; object-fit:cover" alt="">
        <input type="file" onchange="display_image(event)" name="image" id="" class="d-none">
      </label>
      <?php if (!empty($errors)) : ?>
        <div class="text-center text-primary">
          <?= $errors['image'] ?>
        </div>
      <?php endif ?>
      <div class="col-md-6 mb-3">
        <label for="first_name" class="form-label"> First Name</label>
        <input type="text" name="first_name" value="<?= old_value('first_name', $row->first_name) ?>" class="form-control" placeholder="First Name" aria-label="Username" aria-describedby="addon-wrapping">
      </div>
      <div class="col-md-6 mb-3">
        <label for="email" class="form-label"> Last Name</label>
        <input type="text" name="last_name" value="<?= old_value('last_name', $row->last_name) ?>" class="form-control" placeholder="First Name" aria-label="Username" aria-describedby="addon-wrapping">
      </div>
      <div class="col-md-6 mb-3">
        <label for="email" class="form-label"> Email</label>
        <input type="email" name="email" value="<?= old_value('email', $row->email) ?>" class="form-control" placeholder="email" aria-label="email" aria-describedby="addon-wrapping">
      </div>

      <div class="mb-3 col-md-6">
        <label for="gender" class="form-label"> Gender</label>
        <select name="gender" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
          <option selected>Open this select menu</option>
          <option <?= old_selected('gender', 'male', $row->gender) ?> value="male">Male</option>
          <option <?= old_selected('gender', 'female', $row->gender) ?> value="female">Female</option>
        </select>
      </div>
      <small class="text-danger m-2">(leave password empty to keep the old password)</small>
      <div class="col-md-6 mb-3">
        <label for="password" class="form-label"> Password</label>
        <input type="password" name="password" value="<?= old_value('password', '') ?>" class="form-control" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping">
        <?php if (!empty($errors)) : ?>
          <div class="text-center text-primary">
            <?= $errors['password'] ?>
          </div>
        <?php endif ?>
      </div>
      <div class="col-md-6 mb-3">
        <label for="retype-password" class="form-label">Retype Password</label>
        <input type="password" name="retype_password" value="<?= old_value('retype-password', '') ?>" class="form-control" placeholder="Retype Password" aria-label="retype-password" aria-describedby="addon-wrapping">
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
    <script type="text/javascript">
      let valid_image = true;

      function display_image(e) {
        let allowed = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
        let file = e.currentTarget.files[0];
        if (!allowed.includes(file.type)) {
          alert("Only files of this type allowe: " + allowed.toString().replaceAll('image/', ''));
          valid_image = false;
          return;
        } else {
          valid_image = true;
          e.currentTarget.parentNode.querySelector('.img').src = URL.createObjectURL(file)
        }


      }

      function submit_forms(e) {

        if (!valid_image) {
          e.preventDefault();
          alert('Please add a valid image')
          return

        }


      }
    </script>

  </div>

<?php else : ?>
  <div class="alert alert-danger text-center">
    The record not found!
  </div>
  <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>?>">
    <button class="btn btn-primary">Back</button>
  </a>
<?php endif ?>

<?php else: ?>
    <div class="alert alert-danger text-center">
        Access denied! Please contact admin to view this page
    </div>

<?php endif ?>