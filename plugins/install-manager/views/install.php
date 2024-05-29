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
                    <?php if (!empty(message())) : ?>
                        <div class="alert alert-success">
                            <?= message() ?>
                        </div>
                    <?php endif ?>


                    <form class="input-group mb-3 mx-auto">
                        <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
                    </form>

                    <table class="table table-striped ">
                        <tr>

                            <th>Outlet</th>
                            <th>Device</th>
                            <th>Installer</th>
                            <th>Software</th>
                            <th>Version</th>


                            <th>
                                <?php if (user_can('view_users')) : ?>

                                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                                        <button class="btn btn-bd-primary btn-sm">
                                            <i class="fa-solid fa-plus"></i>
                                            Add New</button>
                                    </a>
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
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/device/view/<?= $install->device->id ?>">

                                                <?= $install->device->name ?>
                                            </a>

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
                                            <?= $install->software ?>

                                        </td>
                                        <td>
                                            <?= $install->version ?>

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
                                                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $install->id ?>">
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                            Delete
                                                        </button>
                                                    </a>
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
                    <!-- <?= $pager->display() ?> -->
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
        let show = false;

        function display() {
            show = true;
            return show;

        }
    </script>