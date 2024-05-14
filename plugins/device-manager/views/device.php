    <?php if(user_can('view_users')): ?>


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">Devices</button>
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
        <?php if(!empty(message())): ?>
        <div class="alert alert-success">
            <?= message() ?>
        </div>
        <?php endif ?>
        

        <form class="input-group mb-3 mx-auto">
            <input type="text" name="find" value="<?= old_value('find','','get') ?>" class="form-control"
                aria-label="Amount (to the nearest dollar)">
            <button class="input-group-text  text-white"
                style="background-color: #191C1F;  color:white;">Search</button>
        </form>

        <table class="table table-striped ">
            <tr>

                <th>Device</th>
                <th>Type</th>
                <th>IP</th>
                <th>MAC</th>
                <th>Installed</th>
                <th>Status</th>
                <th>Report</th>
                <th>Task</th>

                <th>

                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                        <button class="btn btn-bd-primary btn-sm">
                            <i class="fa-solid fa-plus"></i>
                            Add New</button>
                    </a>

                </th>

            </tr>
            <tbody>
                <?php if(!empty($devices)): ?>
                <?php foreach($devices as $device): ?>
                <tr>

                    <td>
                        <?= esc($device->name) ?>
                    </td>
                    <td>
                        <?= $device->type ?>

                    </td>

                    <td>
                        <?= $device->ip ?>

                    </td>
                    <td>
                        <?= $device->mac ?>

                    </td>

                    <td>
                        <?= $device->installed ?>

                    </td>
                    <td>
                        <?= $device->status ?>

                    </td>
                    <td>
                        No

                    </td>
                    <td>
                        No

                    </td>
                    <!-- <td><img src="<?= get_image($device->image) ?>" class="img-thumbnail" alt=""
                style="width: 80px; height: 80px; object-fit:cover">            
            </td> -->
                    <!-- <td><?= ucfirst($device->gender) ?></td> -->

                    <!-- <td><?php if(!empty($device->roles)):?>
                <?php foreach($device->roles as $role):?>
                    <div>
                   <i> <?= esc($role) ?></i>
                    </div>
                <?php endforeach?>
                <?php endif?>
                </td> -->
                    <!-- <td><?= get_date($device->date_created)?></td>
                <td><?= get_date($device->date_updated) ?></td> -->
                    <td>
                        <div class="d-flex">
                            <?php if(user_can('view_user_detail')):?>
                            <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $device->id ?>">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                    view
                                </button>
                            </a>
                            <?php endif?>
                            <?php if(user_can('edit_user')):?>
                            <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $device->id ?>">

                                <button class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </a>
                            <?php endif?>
                            <?php if(user_can('delete_user')):?>
                            <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $device->id ?>">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Delete
                                </button>
                            </a>
                            <?php endif?>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php else: ?>
                <div class="alert alert-danger text-center">
                    No recodes found
                    <?php endif ?>
            </tbody>
        </table>
        <!-- <?= $pager->display()?> -->
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">first</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">second</div>
</div>
 <!-- mini header -->
 
    
    </div>
    <?php else: ?>
    <div class="alert alert-danger text-center">
        Access denied! Please contact admin to view this page
    </div>

    <?php endif ?>
    <script>
        let show = false;
        
        function display(){
            show = true;
            return show;

        }
    </script>