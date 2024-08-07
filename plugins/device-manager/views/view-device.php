<div class="d-flex justify-content-between">
  <h4 class="fs-5 p-2 text-capitalize fw-bold"> <?= $device->name ?></h4>
  <div class="d-flex gap-3">
    <div>
      <a type="button" href="<?= ROOT . '/' . $vars['admin_route'] . '/' . $vars['plugin_route']; ?>" class="btn btn-primary btn-sm">Home</a>
    </div>
    
   
  </div>

</div>
<?php require plugin_path('views/port/new.php'); ?>
<?php require plugin_path('views/port/update.php'); ?>
<?php require plugin_path('views/software/update.php'); ?>
<?php require plugin_path('views/software/new.php'); ?>
<?php require plugin_path('views/report/update.php'); ?>
<?php require plugin_path('views/report/new.php'); ?>
<?php require plugin_path('views/delete.php'); ?>





<div class="row px-2 ">
<div class="card m-1 ">
    <div class="card-header">
      Details
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush d-flex flex-row" >
        <li class="list-group-item">
          <div class="d-flex justify-content-between flex-column">
            <div>SN</div>
            <div><?= $device->sn ?></div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="d-flex justify-content-between flex-column">
            <div>MAC</div>
            <div><?= $device->mac1 ?></div>

          </div>
        </li>
        <li class="list-group-item flex-column">
          <div class="d-flex justify-content-between flex-column">
            <div>MAC2</div>
            <div><?= $device->mac2 ?></div>

          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between flex-column">
            <div>FCC ID</div>
            <div><?= $device->fcc_id ?></div>

          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between flex-column ">
            <div>MODEL</div>
            <div><?= $device->model ?></div>

          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between flex-column">
            <div>PRODUCT</div>
            <div><?= $device->product ?></div>

          </div>
        </li>
        <li class="list-group-item">
          <div class="d-flex justify-content-between flex-column">
            <div>COLOR</div>
            <div><?= $device->color ?></div>

          </div>
        </li>
       
      </ul>

    </div>
  </div>


<!-- ---------------------------------------------------------------- -->
 <div class=" col">


    <div >








      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
       
        <li class="nav-item" role="presentation">
          <!-- Report -->
          <button class="nav-link active" id="pills-report-tab" data-bs-toggle="pill" data-bs-target="#pills-report" type="button" role="tab" aria-controls="report" aria-selected="false">Reports</button>
        </li>
        <li class="nav-item" role="presentation">
          <!-- Software -->
          <button class="nav-link" id="pills-software-tab" data-bs-toggle="pill" data-bs-target="#pills-software" type="button" role="tab" aria-controls="pills-software" aria-selected="true">Softwares</button>
        </li>
        <li class="nav-item" role="presentation">
          <!-- Port -->
          <button class="nav-link" id="pills-port-tab" data-bs-toggle="pill" data-bs-target="#pills-port" type="button" role="tab" aria-controls="pills-port" aria-selected="false">Ports</button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <!-- -------------------------------Software Tab------------------------------------------------------ -->
        <div class="tab-pane fade " id="pills-software" role="tabpanel" aria-labelledby="pills-software-tab">
          <table id="software" class="table caption-top">
            <caption>Software(s)
      <button type="button" class="btn btn-primary btn-sm" onclick="Software.display('new')">
        add
      </button>
    </caption>
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
                      <button onclick="Software.delete(<?= $software->id ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-trash"></i>

                      </button>
                    </div>
                  </td>

                </tr>
              <?php endforeach ?>


            </tbody>
          </table>
        </div>
        <!-- ------------------------------------------Report Tab---------------------------------------------------- -->
        <div class="tab-pane show active" id="pills-report" role="tabpanel" aria-labelledby="pills-report-tab">
          <table id="report" class="table caption-top">
            <caption>Report <button type="button" class="btn btn-primary btn-sm" onclick="Report.display('new')">Add</caption>
            <thead>
              <tr>
                <th scope="col">Report</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">Reporter</th>              -->
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($reports as $report) : ?>
                <tr>
                  <td><?= $report->comment ?></td>
                  <td><?= $report->status ?></td>
                  <!-- <td><?= $report->user_id ?></td> -->

                  <td>
                    <div class="d-flex gap-2">


                      <button class="btn btn-warning btn-sm" onclick="Report.row(<?= $report->id ?>)">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                      <button onclick="Report.delete(<?= $report->id ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-trash"></i>

                      </button>
                    </div>
                  </td>

                </tr>
              <?php endforeach ?>


            </tbody>
          </table>
        </div>




        <!-- ------------------------------------------Port Tab---------------------------------------------------- -->

        <div class="tab-pane fade" id="pills-port" role="tabpanel" aria-labelledby="pills-port-tab">
          <table id="port" class="table caption-top">
            <caption>Ports   <button type="button" class="btn btn-primary btn-sm" onclick="Port.display('new')"> Add</button> </caption>
            <thead>
              <tr>
                <th scope="col">Port</th>
                <th scope="col">type</th>
                <th scope="col">Neigbor</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($ports)) : ?>
                <?php foreach ($ports as $port) : ?>
                  <tr>
                    <td><?= $port->port ?></td>
                    <td><?= $port->type ?></td>
                    <?php
                    $neigbor = $devices->first(['id' => $port->neigbor_id]); ?>
                    <td><?= $neigbor->name ?? "No device found" ?></td>
                    <td><?= get_date($port->date_created) ?></td>
                    <td>
                      <div class="d-flex gap-2">


                    <td>
                      <div class="d-flex gap-2">


                        <button class="btn btn-warning btn-sm" onclick="Port.row(<?= $port->id ?>)">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button onclick="Port.delete(<?= $port->id ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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






  </div>


</div>


</div>
<script src="<?= ROOT ?>/assets/js/plugin.js">

</script>
<script>
  var url = '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/'

  var Software = new CRUD(url, 'software');




  function createSoftware(data, event) {
    event.preventDefault();
    Software.create(data)

  }

  function updateSoftware(data, event) {
    event.preventDefault();
    Software.update(data)
  }

  var Port = new CRUD(url, 'port');

  function createPort(data, event) {
    event.preventDefault();
    // console.log("Report")
    Port.create(data)

  }

  function updatePort(data, event) {
    event.preventDefault();
    Port.update(data)

  }
  var Report = new CRUD(url, 'report');

  function createReport(data, event) {
    event.preventDefault();
    // console.log("Report")
    Report.create(data)

  }

  function updateReport(data, event) {
    event.preventDefault();
    Report.update(data)

  }
</script>