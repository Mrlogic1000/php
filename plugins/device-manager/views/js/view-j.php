<script>
  var editReport = new bootstrap.Modal($('#editReport'), {})
  var reportModal = new bootstrap.Modal($('#reportModal'), {})
  var successAlert = new bootstrap.Modal($('#success'), {})
  var softwareForm = new bootstrap.Modal($('#softwareForm'), {})
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
          for (key in row) {
            if (key == 'description') {
              $(`textarea#${key}`).text(row[key])
            }
            $(`#${key}`).val(row[key])
          }
         

        }
       
        // if (obj.message !== '') {
        //   var message = obj.message;
        //   $('#success').text(message);
        //   successAlert.show();
        //   setTimeout(function() {
        //     successAlert.hide();
        //   }, 2000);

        // }
        // $("#table").load("<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");
        // location.reload()


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
      send_data(formdata, obj, address)
      editReport.show();

    } else

     if(form_id == 'new'){
      var formdata = new FormData(data);
    var obj = {
      'form_id': form_id
    }
    send_data(formdata, obj, address);
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