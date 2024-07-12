
<script>
  'use strict';
  

    // src="<?= plugin_http_path('assets/js/plugin.js') ?>"
  var newSoftware = new bootstrap.Modal($('#newSoftware'), {})
  var updateSoftware = new bootstrap.Modal($('#updateSoftware'), {})
  var updateReport = new bootstrap.Modal($('#updateReport'), {})
  var newReport = new bootstrap.Modal($('#newReport'), {})
  var successAlert = new bootstrap.Modal($('#success'), {})
  // var alertModal = new bootstrap.Modal($('#alert'), {})
  // var installDevice = new bootstrap.Modal($('#installDevice'), {})

  // $(document).ready(function() {
  //   successAlert.show();
  //   setTimeout(function() {
  //     successAlert.hide();
  //   }, 2000);
  // })


  // dynamic modal call
  function callModal(first, string = '', show = 'show') {
    var mod = first + string.charAt(0).toUpperCase() + string.slice(1)

    console.log(mod)
    // $(`#${mod}`).modal(`${show}`)
    mod ?? 'newSoftware'.hide()

  }



  function send_data(formdata, obj, address) {
    for (let key in obj) {
      formdata.append(key, obj[key])
    }
    $.ajax({
      url: '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/' + address,
      method: 'POST',
      data: formdata,
      processData: false,
      contentType: false,
      success: function(response) {
        var db = JSON.parse(response);

        handel_result(db, address)


      }

    })


  }



  function handel_result(obj, address) {
    if (typeof obj == 'object') {

      if (obj.statusCode == 200) {
        if (obj.form_id == 'row') {
          var row = obj.row
          for (let key in row) {
            if (key == 'description') {
              $(`textarea#${key}`).text(row[key])
            }
            $(`#${key}`).val(row[key])
          }


        } else {

          if (obj.message !== '') {
            var message = obj.message;
            $('.text-success').text(message);
            successAlert.show();
            console.log(message)
            setTimeout(function() {
              successAlert.hide();
              $(`#${address}`).load(`<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $device->id ?> #${address}`);
            }, 2000);

          }
        }



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
    updateSoftware.hide()


  })





  function submitForm(data, id, type, event) {
    event.preventDefault();

    var split_type = type.split("-")
    var address = split_type[0]
    var form_id = split_type[1]

    if (form_id == 'delete') {
      var formdata = new FormData();

      var obj = {
        'id': id,
        'form_id': form_id
      }

      $('.confirm').click(function() {
        var ok = $(this).attr('id')
        if (ok) {
          console.log(obj)
          send_data(formdata, obj, address)
        }
      })
    } else
    if (form_id == 'row') {
      
      var formdata = new FormData();
      var obj = {
        'id': id,
        'form_id': form_id
      }
      send_data(formdata, obj, address);
      if (address == 'software') {
        // updateSoftware.show()
        Software.row()
      } else
      if (address == 'report') {
        // updateReport.show()
      }





    } else
    if (form_id == 'update') {
      var formdata = new FormData(data);
      var obj = {
        'form_id': form_id
      }
      send_data(formdata, obj, address);
      // callModal('update', address, 'hide');
      updateSoftware.hide()
    } else
    if (form_id == 'new') {     
      var formdata = new FormData(data);
      var obj = {
        'form_id': form_id
      }
      send_data(formdata, obj, address);
      document.getElementById('newForm').reset();
      if (address == 'software') {
        updateSoftware.show()
      } else
      if (address == 'report') {
        updateReport.show()
      }
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