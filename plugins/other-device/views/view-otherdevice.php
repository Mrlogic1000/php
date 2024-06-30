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
<?php require plugin_path('views/reportModal.php'); ?>
<?php require plugin_path('views/delete.php'); ?>






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

<script>
  // var editModal = new bootstrap.Modal($('#editModal'), {})
  var reportModal = new bootstrap.Modal($('#reportModal'), {})
  var successAlert = new bootstrap.Modal($('#success'), {})
  // var softModal = new bootstrap.Modal($('#softModal'), {})
  // var alertModal = new bootstrap.Modal($('#alert'), {})
  // var installDevice = new bootstrap.Modal($('#installDevice'), {})

  // $(document).ready(function() {
  //   successAlert.show();
  //   setTimeout(function() {
  //     successAlert.hide();
  //   }, 2000);
  // })







  function send_data(formdata, obj, address) {
    for (key in obj) {
      formdata.append(key, obj[key])
    }
    $.ajax({
      url: address ?? '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/ajax',
      method: 'POST',
      data: formdata,
      processData: false,
      contentType: false,
      success: function(response) {
        var db = JSON.parse(response);

        handel_result(db)


      }

    })


  }



  function handel_result(obj) {
    if (typeof obj == 'object') {

      if (obj.statusCode == 200) {
        reportModal.hide();
        if (obj.message !== '') {
          var message = obj.message;
          $('#success').text(message);
          successAlert.show();
          setTimeout(function() {
            successAlert.hide();
          }, 2000);

        }
        $("#table").load("<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");


      }

    } else
    if (obj.statusCode == 400) {
      if (obj.errors !== '') {

        var errors = obj.errors;
        $('.alert').removeClass('d-none')
        $('.alert').text(errors)
        errors = '';
      }


    }
  }





  $(document).on('click', '#close', function() {
    editModal.hide()


  })





  function submitForm(data, id, type, event) {
    event.preventDefault();
    if (type == 'delete') {
      var formdata = new FormData();
      $('.confirm').click(function() {
        var ok = $(this).attr('id')
        if (ok) {
          send_data(formdata, obj)
        }
      })
    } else {
      if (type == 'row') {
        var formdata = new FormData();
        var obj = {
          'id': id,
          'form_id': type
        }
        send_data(formdata, obj)
        editModal.show();

      } else {

        var formdata = new FormData(data);
        var obj = {
          'form_id': type
        }
      }
      send_data(formdata, obj);
    }



  }











  function getValue(e, id) {
    var outlet_id = e.value;
    var formdata = new FormData();
    var obj = {
      'device_id': id,
      'outlet_id': outlet_id,
      'form_id': 'install'
    }
    send_data(formdata, obj)
  }
</script>