<?php if (user_can('view_users')) : ?>
    <div class="table-responsive">

        <form class="input-group mb-3 mx-auto">
            <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
            <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
        </form>

        <table class="table table-striped ">
            <tr>

                <th>Device</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>
                    <?php if (user_can('view_outlet')) : ?>
                        <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                            <button class="btn btn-bd-primary btn-sm">
                                <i class="fa-solid fa-plus"></i>
                                Add New</button>
                        </a>
                    <?php endif ?>
                </th>

            </tr>
            <tbody>
                <?php if (!empty($reports)) : ?>
                    <?php foreach ($reports as $report) : ?>

                        <tr>

                            <td>
                                <?php if (!empty($report->device)) : ?>
                                    <?php foreach ($report->device as $device) : ?>
                                        <?= $device->name ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </td>
                            <td>
                                <?= $report->comment ?>
                            </td>
                            <td>
                                <?= $report->status ?>
                            </td>




                            <td><?= get_date($report->date_created) ?></td>
                            <td><?= get_date($report->date_updated) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <?php if (user_can('view_user_detail')) : ?>
                                        <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $report->id ?>">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                                view
                                            </button>
                                        </a>
                                    <?php endif ?>
                                    <?php if (user_can('edit_user')) : ?>
                                        <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $report->id ?>">

                                            <button class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </button>
                                        </a>
                                    <?php endif ?>
                                    <?php if (user_can('delete_user')) : ?>
                                            <button id="<?= $report->id ?>" class="delete btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                $(`textarea#${key}`).text(row[key])                            }
                            $(`#${key}`).val(row[key])
                        }
                    } else {
                        var message = obj.message
                        newModal.hide()
                        $('.alert').removeClass('d-none')
                        $('.alert').text(message)
                        $("#table").load("<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");
                        message = ''
                        $('.alert').addClass('d-none')
                    }

                } else
                if (obj.statusCode == 400) {
                    var errors = obj.errors;                   
                    $('.alert').removeClass('d-none')                   
                        $('.alert').text(errors )
                        errors = '';
                    

                }
            }


        }


    $(document).on('click', '.delete', function(e) {
        var id = $(this).attr('id');
        var formdata = new FormData();
        formdata.append("form_id", "delete")
        var obj = {
            id: id
        }

        $('.confirm').click(function() {
            var ok = $(this).attr('id')
            console.log(ok)
            if (ok) {
                send_data(formdata, obj)

            }
        })



    })
</script>