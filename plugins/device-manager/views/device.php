


        <div class="table-responsive">
            <?php if (!empty(message())) : ?>
                <div class="alert alert-success">
                    <?= message() ?>
                </div>
            <?php endif ?>
            <?php require plugin_path('views/device/edit.php'); ?>
            <?php require plugin_path('views/device/new.php'); ?>
            <?php require plugin_path('views/delete.php'); ?>
            <!-- -------------------------------------------------------------------- -->


            <form class="input-group mb-3 mx-auto">
                <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
            </form>

            <div class="alert alert-success d-none"></div>

            <table id="table" class="table table-striped ">
                <!-- <div class="alert alert-success d-none"></div> -->
                <tr>

                    <th>DEVICE</th>
                    <th>SN</th>
                    <th>MAC1</th>
                    <th>IP</th>
                    <th>Model</th>
                    <th>PRODUCT</th>
                    <th>COLOR</th>
                    <th>LOCATION</th>
                    <th>STATUS</th>
                    <th>
                            <button type="button" class="btn btn-primary" onclick="newModal.show()">
                                Add New
                            </button>

                    </th>

                </tr>
                <tbody>
                    <?php if (!empty($devices)) : ?>
                        <?php foreach ($devices as $device) : ?>
                            <tr>

                                <td><?= esc($device->name) ?></td>
                                <td><?= $device->sn ?></td>
                                <td><?= $device->mac1 ?></td>
                                <td><?= $device->ip ?></td>
                                <td><?= $device->model ?></td>
                                <td><?= $device->product ?></td>
                                <td><?= $device->color ?></td>
                                <td><?= $device->location ?></td>

                                <td>
                                    <i class="fa-solid fa-microchip  <?= $device->status == 0 ? 'text-success' : 'text-danger' ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $device->status ?>"></i>
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        
                                            <button class="btn btn-primary btn-sm" onclick="installDevice.show()">
                                                <i class="fa-solid fa-plug"></i>
                                            </button>
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $device->id ?>">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-eye"></i>

                                                </button>
                                            </a>

                                            <button id="<?= $device->id ?>" class="edit btn btn-info" onclick="submitForm(this,'<?= $device->id ?>','device-row',event)">
                                                <i class="fa-solid fa-pen-to-square"></i>

                                            </button>
                                        <?php if (user_can('delete_device')) : ?>
                                            <button id="<?= $device->id ?>" onclick="submitForm(this,<?= $device->id ?>,'device-delete',event)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

   <?php require plugin_path('views/js/device-j.php'); ?>