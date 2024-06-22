<div class="d-flex justify-content-between">
  <h4 class="fs-5 p-2"> <?= $device->name ?></h4>
  <div class="d-flex gap-3">
  <div>
    <a type="button" href="<?= ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route']; ?>" class="btn btn-primary btn-sm">Home</a>
  </div>
 <div>
 <button type="button" class="btn btn-primary btn-sm" onclick="softwareForm.show()">
    Install Software
  </button>
 </div>
  </div>

</div>
<?php require plugin_path('views/softwareForm.php'); ?>





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
        <div>MAC</div>
        <div><?= $device->mac1 ?></div>

      </div>
    </li>
    <li class="list-group-item">
      <div class="d-flex justify-content-between">
        <div>MAC2</div>
        <div><?= $device->mac2 ?></div>

      </div>
    </li>
    <li class="list-group-item">
      <div class="d-flex justify-content-between">
        <div>FCC ID</div>
        <div><?= $device->fcc_id ?></div>

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
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script>
   var softwareForm = new bootstrap.Modal($('#softwareForm'), {})
</script>