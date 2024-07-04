    



        <div class="table-responsive">
            <?php if (!empty(message())) : ?>
                <div class="alert alert-success">
                    <?= message() ?>
                </div>
            <?php endif ?>
            <?php require plugin_path('views/softModal.php'); ?>
            <?php require plugin_path('views/editModal.php'); ?>
            <?php require plugin_path('views/installDevice.php'); ?>
            <!-- -------------------------------------------------------------------- -->


            <form class="input-group mb-3 mx-auto">
                <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
            </form>

            <div class="alert alert-success d-none"></div>

            <table id="table" class="table table-striped ">
                <!-- <div class="alert alert-success d-none"></div> -->
                <tr>

                    <th>software</th>
                    <th>Version</th>
                    <th>Login</th>
                    <th>Password</th>                    
                    <th>
                        <?php if (user_can('view_users')) : ?>
                            <button type="button" class="btn btn-primary" onclick="newModal.show()">
                                Add New
                            </button>
                        <?php endif ?>

                    </th>

                </tr>
                <tbody>
                    <?php if ($softwares) : ?>
                        <?php foreach ($softwares as $software) : ?>
                            <tr>

                                <td><?= esc($software->name) ?></td>
                                <td><?= $software->version ?></td>
                                <td>
                                <?= $software->username ?>

                                </td>
                                <td><?= $software->password ?></td>
                               
                                <td><?= $software->model ?? 'Unknown' ?></td>
                                <td>
                                    <i class="fa-solid fa-microchip  <?= $software->status == 'good' ? 'text-success' : 'text-danger' ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $software->status ?>"></i>
                                <td>
                                    <div class="d-flex gap-2">
                                        <?php if (user_can('install_device')) : ?>
                                            <button class="btn btn-primary btn-sm" onclick="installDevice.show()">
                                                <i class="fa-solid fa-plug"></i>
                                            </button>
                                        <?php endif ?>
                                        <?php if (user_can('view_device_detail')) : ?>
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $software->id ?>">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-eye"></i>

                                                </button>
                                            </a>
                                        <?php endif ?>
                                        <?php if (user_can('edit_device')) : ?>

                                            <button id="<?= $software->id ?>" class="edit btn btn-info" onclick="editModal.show()">
                                                <i class="fa-solid fa-pen-to-square"></i>

                                            </button>
                                        <?php endif ?>
                                        <?php if (user_can('delete_device')) : ?>
                                            <button id="<?= $software->id ?>" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

        </div>

        </div>
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



    



    <div id="alert" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">

                    </div>
                    <h4 class="modal-title w-100">Awesome!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
                </div>
                <div class="modal-footer">
                    <button onclick="testModal.hide()" data-bs-dismiss="modal" class="btn btn-success btn-block">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var editModal = new bootstrap.Modal($('#editModal'), {})
        var newModal = new bootstrap.Modal($('#newModal'), {})
        var alertModal = new bootstrap.Modal($('#alert'), {})
        var installDevice = new bootstrap.Modal($('#installDevice'), {})







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

                    if (obj.form_id == 'row') {
                        var row = obj.row
                        for (key in row) {
                            if (key == 'comment') {
                                $(`textarea#${key}`).text(row[key])
                            }
                            $(`#${key}`).val(row[key])
                        }
                    } else {
                        if (obj.form_id == 'save') {
                            newModal.hide()
                            $("#saveForm")[0].reset()
                        } else {
                            if (obj.form_id == 'edit') {

                                editModal.hide()
                                $("#editForm")[0].reset()
                            }
                        }
                        var message = obj.message
                        // $("#table").load("<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");
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

        $(document).on('submit', '#saveForm', function(e) {
            $("#insertBtn").attr("disabled", "disabled");
            e.preventDefault();

            var formdata = new FormData(this);
            var obj = {
                form_id: 'save'
            }
            send_data(formdata, obj);



        })

        $(document).on('submit', '#editForm', function(e) {
            $("#insertBtn").attr("disabled", "disabled");
            e.preventDefault();

            var formdata = new FormData(this);
            var obj = {
                'form_id': 'edit'
            }
            send_data(formdata, obj)




        })



        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            var formdata = new FormData();
            var obj = {
                'id': id,
                'form_id': 'row'
            }
            send_data(formdata, obj)
        })




        $(document).on('click', '.delete', function(e) {

            var id = $(this).attr('id');
            var formdata = new FormData();
            formdata.append("form_id", "delete")
            var obj = {
                id: id
            }

            $('.confirm').click(function() {
                var ok = $(this).attr('id')

                if (ok) {
                    send_data(formdata, obj)

                }
            })



        })



        function getValue(e,id){
            var outlet_id = e.value;                    
            var formdata = new FormData();
            var obj = {
                'device_id':id,
                'outlet_id': outlet_id,
                'form_id': 'install'
            }
            send_data(formdata,obj)
        }
    </script>