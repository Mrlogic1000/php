<div class="d-flex justify-content-between">
  <h4 class="fs-5 p-2 text-capitalize fw-bold"> <?= $device->name ?></h4>
  <div class="d-flex gap-3">
    <div>
      <a type="button" href="<?= ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route']; ?>" class="btn btn-primary btn-sm">Home</a>
    </div>
    <div>
      <button type="button" class="btn btn-primary btn-sm" onclick="Software.display('new')">
        Install software
      </button>
    </div>
    <div>
      <button type="button" class="btn btn-primary btn-sm" onclick="Report.display('new')">
        Report
      </button>
    </div>
  </div>

</div>
<?php require plugin_path('views/report/new.php'); ?>
<?php require plugin_path('views/report/update.php'); ?>
<?php require plugin_path('views/software/update.php'); ?>
<?php require plugin_path('views/software/new.php'); ?>
<?php require plugin_path('views/delete.php'); ?>





<div class="row px-2 ">
  <div class="card m-1 col">
    <div class="card-header">
      Details
    </div>
    <div class="card-body">
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
            <div><?= get_date($device->date_updated) ?></div>

          </div>
        </li>

      </ul>

    </div>
  </div>
  <?php if (!empty($softwares)) : ?>
    <div class="card col-8 m-1">
      <div class="card-body">


        <table id="software" class="table caption-top">
          <caption>Software(s)</caption>
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Lisense</th>
              <th scope="col">Version</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($softwares as $software) : ?>
              <tr>
                <td><?= $software->name ?></td>
                <td><?= $software->username ?></td>
                <td><?= $software->password ?></td>
                <td><?= $software->license ?></td>
                <td><?= $software->version ?></td>
                <td><?= $software->description ?></td>
                <td>
                  <div class="d-flex gap-2">


                    <button class="btn btn-warning btn-sm" onclick="Software.row(<?= $software->id ?>)">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button  onclick="Software.delete(<?= $software->id ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="fa-solid fa-trash"></i>

                    </button>
                  </div>
                </td>

              </tr>
            <?php endforeach ?>


          </tbody>
        </table>



      </div>
    </div>
  <?php endif ?>

</div>

<div class="card">


  <div class="card-body">

    <table id="table" class="table caption-top">
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


                <td>
                  <div class="d-flex gap-2">


                    <button class="btn btn-warning btn-sm" onclick="Report.row(<?= $report->id ?>)">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button  onclick="Report.delete(<?= $report->id ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="fa-solid fa-trash"></i>

                    </button>
                  </div>
                </td>
                </div>
              </td>

            </tr>
          <?php endforeach ?>
        <?php endif ?>


      </tbody>
    </table>
  </div>
  
    
</div>
<script src="<?=ROOT?>/assets/js/plugin.js">

</script>
<script>
  var url = '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/' 

  var Software = new CRUD(url,'software');
  


  
  function createSoftware(data,event){    
    event.preventDefault();
    Software.create(data)

  }
  function updateSoftware(data,event){    
    event.preventDefault();
    Software.update(data)
  }

  var Report = new CRUD(url,'report');

  function createReport(data,event){    
    event.preventDefault();
    // console.log("Report")
    Report.create(data)

  }
  function updateReport(data,event){    
    event.preventDefault();
    Report.update(data)

  }
  

  

 
</script>

