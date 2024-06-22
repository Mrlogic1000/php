    <?php if (user_can('view_users')) : ?>

        
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">installs</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="table-responsive">
                   
                    <div id="errorMessage" class="alert alert-danger d-none">

                    </div>


                    <form class="input-group mb-3 mx-auto">
                        <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
                    </form>

                    <div class="alert alert-success d-none"></div>
                    <?php require plugin_path('views/newModal.php'); ?>

                    <table class="table table-striped ">
                        <tr>

                            <th>Outlet</th>
                            <th>Device</th>
                            <th>IP</th>
                            <th>version</th>
                            <th>Installer</th>


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
                            <?php if (!empty($installs)) : ?>
                                <?php foreach ($installs as $install) : ?>
                                    <tr>

                                        <td>
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/outlet/view/<?= $install->outlet->id ?>">

                                                <?= $install->outlet->outlet ?>
                                            </a>


                                        </td>
                                        <td>
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/devices/view/<?= $install->device->id ?>">

                                                <?= $install->device->name ?>
                                            </a>

                                        </td>
                                        <td>
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/device/view/<?= $install->device->id ?>">

                                                <?= $install->ip ?>
                                            </a>

                                        </td>
                                        <td>

                                            <?= $install->version ?>
                                        </td>
                                        <td>
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/user/view/<?= $install->installer->id ?? '' ?>">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <!-- <img src="<?= get_image($install->installer->image ?? '') ?>"  style="width: 60px; height: 60px; object-fit:cover" alt="" >  -->
                                                    <?= $install->installer->first_name ?? '' ?> <?= $install->installer->last_name ?? '' ?>
                                                </div>


                                            </a>

                                        
                                           

                                        </td>
                                        


                                        <td>
                                            <div class="d-flex gap-2">
                                               
                                                <?php if (user_can('view_device_detail')) : ?>
                                                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $install->id ?>">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa-solid fa-eye"></i>
                                                            view
                                                        </button>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (user_can('edit_device')) : ?>
                                                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $install->id ?>">

                                                        <button class="btn btn-warning btn-sm">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (user_can('delete_device')) : ?>
                                                    <!-- <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $install->id ?>"> -->
                                                        <button id="<?= $install->id ?>" class="delete btn btn-danger btn-sm">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                            Delete
                                                        </button>
                                                    <!-- </a> -->
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
               
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">first</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">second</div>
            </div>
            <!-- mini header -->


        </div>
    <?php else : ?>
        <div class="alert alert-danger text-center">
            Access denied! Please contact admin to view this page
        </div>

    <?php endif ?>



    <script>
    // var editModal = new bootstrap.Modal($('#editModal'), {})
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



        // function handel_result(obj) {
        //     if (typeof obj == 'object') {

        //         if (obj.statusCode == 200) {

        //             if (obj.form_id == 'row') {
        //                 var row = obj.row
        //                 for (key in row) {
        //                     if (key == 'comment') {
        //                         $(`textarea#${key}`).text(row[key])
        //                     }
        //                     $(`#${key}`).val(row[key])
        //                 }
        //             } else {
        //                 if (obj.form_id == 'new') {
        //                     newModal.hide()
        //                     $("#saveForm")[0].reset()
        //                 } else {
        //                     if (obj.form_id == 'edit') {
        //                         editModal.hide()
        //                         $("#editForm")[0].reset()
        //                     }
        //                 }
        //                 var message = obj.message
        //                 // $("#table").load("<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");
        //                 $('.alert').removeClass('d-none')
        //                 $('.alert').text(message)
        //                 setTimeout(function() {
        //                     $('.alert').text("")
        //                     $('.alert').addClass('d-none')

        //                 }, 2000);

        //             }

        //         } else
        //         if (obj.statusCode == 400) {
        //             var errors = obj.errors;
        //             $('.alert').removeClass('d-none')
        //             $('.alert').text(errors)
        //             errors = '';


        //         }
        //     }


        // }


        // $(document).on('click', '#close', function() {
        //     editModal.hide()


        // })





        function submitForm(data, id, type,event) {
            event.preventDefault();   
           
            if (type == 'delete') {
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
        //         'form_id': 'install'
        //     }
        //     send_data(formdata, obj)
        // }
      
  

    </script>

    