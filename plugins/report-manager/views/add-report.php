<div class="row mx-auto  ">
  <?php if (!empty($errors)) : ?>

    <?php foreach ($errors as $error) : ?>
      <div class="alert alert-success">
        <?= $error ?>
      </div>
    <?php endforeach ?>
  <?php endif ?>


  <form class="row g3 col-md-5 mx-auto shadow p-3 " method="post">
    <?= csrf() ?>
    <h4 class="my-3">Create Report</h4>
    <?php if (!empty($errors)) : ?>
      <h6>Errors</h6>
      <?php foreach ($errors as $error) : ?>
        <div class="text-danger">
          <?= $error ?>
        </div>
      <?php endforeach ?>
    <?php endif ?>

    <div class="col-md-6 mb-3">
      <label for="device" class="form-label">Device Name</label>
      <select name="device_id" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
        <?php if (!empty($devices)) : ?>

          <?php foreach ($devices as $device) : ?>
            <option <?= old_selected('device_id', $device->id) ?> value="<?= $device->id ?>"><?= $device->name ?></option>

          <?php endforeach ?>
        <?php endif ?>
      </select>

    </div>

    

  
    <!-- <div class="col-md-6 mb-3">
      <label for="installer" class="form-label">Installer</label>
      <select name="user_id" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
        <?php if (!empty($users)) : ?>
          <?php foreach ($users as $user) : ?>
            <option <?= old_selected('user_id', $user->id) ?> value="<?= $user->id ?>"><?= $user->first_name ?> <?= $user->last_name ?></option>

          <?php endforeach ?>
        <?php endif ?>
      </select>
      

    </div> -->

    <div class="mb-3 col-md-6">
      <label for="gender" class="form-label">Status</label>
      <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
        <option <?= old_selected('status', 'cable') ?> value="cable">Cable</option>
        <option <?= old_selected('status', 'IP') ?> value="IP">IP</option>
        <option <?= old_selected('status', 'damage') ?> value="damage">Damage</option>
        <option <?= old_selected('status', 'power') ?> value="power">Power</option>
      </select>
    </div>
    <!-- <div class="mb-3 col-md-6">
      <label for="software" class="form-label">Software Upgraded</label>
      <select name="software" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
        <option <?= old_selected('software', 'yes') ?> value="yes">Yes</option>
        <option <?= old_selected('software', 'no') ?> value="faulty">No</option>
      </select>
    </div> -->
    

    <div class="mb-3">
      <label for="comment" class="form-label">Comment</label>
      <textarea name="comment" class="form-control" id="comment" rows="3">
  <?= old_value('comment') ?>
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