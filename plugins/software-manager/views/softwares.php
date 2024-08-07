    <div class="table-responsive">
        <?php if (!empty(message())) : ?>
            <div class="alert alert-success">
                <?= message() ?>
            </div>
        <?php endif ?>
        <?php require plugin_path('views/software/update.php'); ?>
        <?php require plugin_path('views/software/new.php'); ?>
        <?php require plugin_path('views/software/delete.php'); ?>

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
                <th>Hardware</th>
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
                            <?php $hardware = $deviceModel->first(['id'=>$software->device_id]);                            
                            ?>

                            <td><a href="<?= ROOT ?>/<?= $admin_route ?>/network-devices/view/<?= $hardware->id??0 ?>"><?= $hardware->name ?? 'Unknown' ?>
                        </a></td>
                           
                               
                            
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
       
    </script>