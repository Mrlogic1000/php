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
    <h4 class="my-3">Add New Device</h4>
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

    <div class="col-md-6 mb-3">
      <label for="outlet" class="form-label">Outlet</label>
      <select name="outlet_id" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
        <?php if (!empty($devices)) : ?>

          <?php foreach ($outlets as $outlet) : ?>
            <option <?= old_selected('device_id', $outlet->id) ?> value="<?= $outlet->id ?>"><?= $outlet->outlet ?></option>

          <?php endforeach ?>
        <?php endif ?>
      </select>

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
      <label for="installer" class="form-label">Installer</label>
      <input type="text" name="installer" value="<?= old_value('installer') ?>" class="form-control" placeholder="installer" aria-label="installer" aria-describedby="addon-wrapping">


    </div>

    <div class="mb-3 col-md-6">
      <label for="gender" class="form-label">Status</label>
      <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
        <option <?= old_selected('status', 'good') ?> value="good">Good</option>
        <option <?= old_selected('status', 'bad') ?> value="faulty">Fauty</option>
      </select>
    </div>

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