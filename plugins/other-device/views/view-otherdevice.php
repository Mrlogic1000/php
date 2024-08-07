<div class="d-flex justify-content-between">
  <h4 class="fs-5 p-2"> <?= $device->name ?></h4>
  <div class="d-flex gap-3">
    <div>
      <a type="button" href="<?= ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route']; ?>" class="btn btn-primary btn-sm">Home</a>
    </div>
    <div>
      <button type="button" class="btn btn-primary btn-sm" onclick="reportModal.show()">
        Report
      </button>
    </div>
  </div>

</div>
<?php require plugin_path('views/report/new.php'); ?>
<?php require plugin_path('views/modal/delete.php'); ?>






<div class="card">
  <div class="card-header">
    Details
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <div class="d-flex justify-content-between">
        <div>SN</div>
        <div><?= $device->sn ?></div>
      </div>
    </li>


    <li class="list-group-item">
      <div class="d-flex justify-content-between">
        <div>MODEL</div>
        <div><?= $device->model ?></div>

      </div>
    </li>
    <li class="list-group-item">
      <div class="d-flex justify-content-between">
        <div>Product</div>
        <div><?= $device->product ?></div>

      </div>
    </li>
    <li class="list-group-item">
      <div class="d-flex justify-content-between">
        <div>Color</div>
        <div><?= $device->color ?></div>

      </div>
    </li>
    <li class="list-group-item">
      <div class="d-flex justify-content-between">
        <div>Last Updated on</div>
        <div><?= $device->date_updated ?></div>

      </div>
    </li>

  </ul>
</div>

<div class="card">


  <div class="card-body">

    <table class="table caption-top">
      <caption>Reports</caption>
      <thead>
        <tr>
          <th scope="col">Reference</th>
          <th scope="col">Status</th>
          <th scope="col">Comment</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($reports)) : ?>
          <?php foreach ($reports as $report) : ?>
            <tr>
              <td><?= $report->reference ?></td>
              <td><?= $report->status ?></td>
              <td><?= $report->comment ?></td>
              <td><?= get_date($report->date_created) ?></td>
              <td>
                <div class="d-flex gap-2">

                  <?php if (user_can('view_device_detail')) : ?>
                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $device->id ?>">
                      <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-eye"></i>
                      </button>
                    </a>
                  <?php endif ?>
                  <?php if (user_can('edit_device')) : ?>
                    <button class="btn btn-warning btn-sm" onclick="submitForm(this,'<?= $device->id ?>','row',event)">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  <?php endif ?>
                  <?php if (user_can('delete_device')) : ?>
                    <button id="<?= $device->id ?>" onclick="submitForm(this,<?= $device->id ?>,'delete',event)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="fa-solid fa-trash"></i>

                    </button>
                  <?php endif ?>
                </div>
              </td>

            </tr>
          <?php endforeach ?>
        <?php endif ?>


      </tbody>
    </table>
  </div>

</div>

