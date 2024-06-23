    <?php if (user_can('view_users')) : ?>

        
        <div class="table-responsive">
                   
                    <div id="errorMessage" class="alert alert-danger d-none">

                    </div>


                    <form class="input-group mb-3 mx-auto">
                        <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
                    </form>

                    <div class="alert alert-success d-none"></div>
                    <?php require plugin_path('views/newModal.php'); ?>
                    <?php require plugin_path('views/editModal.php'); ?>
                    <?php require plugin_path('views/delete.php'); ?>

                    <table id="table" class="table table-striped ">
                        <tr>

                            <th>DEVICE</th>
                            <th>SN</th>
                            <th>MODEL</th>
                            <th>PRODUCT</th>
                            <th>COLOR</th>
                            <th>LOCATION</th>
                            <th>STATUS</th>


                            <th>
                                <?php if (user_can('view_users')) : ?>

                                        <button class="btn btn-bd-primary btn-sm" onclick="newModal.show()">
                                            <i class="fa-solid fa-plus"></i>
                                            Add New
                                        </button>
                                <?php endif ?>

                            </th>

                        </tr>
                        <tbody>
                            <?php if (!empty($devices)) : ?>
                                <?php foreach ($devices as $device) : ?>
                                    <tr>

                                        <td><?= $device->name ?> </td>
                                        <td> <?= $device->sn?></td>
                                        <td> <?= $device->model ?> </td>
                                        <td> <?= $device->product ?> </td>
                                        <td> <?= $device->color ?> </td>
                                        <td> <?= $device->location ?> </td>
                                        <td>
                                             <i class="fa-solid fa-microchip  <?= $device->status == 0 ? 'text-success' : 'text-danger' ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $device->status ?>"></i>
                                        </td>
                                       
                                        


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
                            <?php else : ?>
                                <div class="alert alert-danger text-center">
                                    No recodes found
                                <?php endif ?>
                        </tbody>
                    </table>

       
            <!-- mini header -->


        </div>


         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete your account? This action cannot be undone and you will be unable
                            to recover any data.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancle</button>
                        <button type="button" id="true" data-bs-dismiss="modal" class="confirm btn btn-danger">Yes, delete
                            it!</button>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-danger text-center">
            Access denied! Please contact admin to view this page
        </div>

    <?php endif ?>



    <script>
    var editModal = new bootstrap.Modal($('#editModal'), {})
        var newModal = new bootstrap.Modal($('#newModal'), {})
        // var softModal = new bootstrap.Modal($('#softModal'), {})
        // var alertModal = new bootstrap.Modal($('#alert'), {})
        // var installDevice = new bootstrap.Modal($('#installDevice'), {})

        function send_data(formdata, obj) {
            for (key in obj) {
                formdata.append(key, obj[key])
            }
            $.ajax({
                url: '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/ajax',
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

                    if (obj.form_id == 'row') {
                        var row = obj.row
                        for (key in row) {
                            if (key == 'comment') {
                                $(`textarea#${key}`).text(row[key])
                            }
                            $(`#${key}`).val(row[key])
                        }
                    } else {
                        if (obj.form_id == 'new') {
                            newModal.hide()
                            $("#saveForm")[0].reset()
                        } else {
                            if (obj.form_id == 'edit') {
                                editModal.hide()
                                $("#editForm")[0].reset()
                            }
                        }
                        var message = obj.message
                        $("#table").load("<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");
                        $('.alert').removeClass('d-none')
                        $('.alert').text(message)
                        setTimeout(function() {
                            $('.alert').text("")
                            $('.alert').addClass('d-none')

                        }, 2000);

                    }

                } else
                if (obj.statusCode == 400) {
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





        function submitForm(data, id, type,event) {
            event.preventDefault();   
           
            if (type == 'delete') {
                var obj = {
                        'id': id,
                        'form_id': type
                    }
                var formdata = new FormData();
                $('.confirm').click(function() {
                    var ok = $(this).attr('id')
                    if (ok) {
                        send_data(formdata, obj)
                    }
                })
            } else{
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



        







        // function getValue(e, id) {
        //     var outlet_id = e.value;
        //     var formdata = new FormData();
        //     var obj = {
        //         'device_id': id,
        //         'outlet_id': outlet_id,
        //         'form_id': 'device'
        //     }
        //     send_data(formdata, obj)
        // }
      
  

    </script>

    