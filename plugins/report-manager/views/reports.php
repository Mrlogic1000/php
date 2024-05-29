
<?php if(user_can('view_users')): ?>
<div class="table-responsive">

<form class="input-group mb-3 mx-auto">  
  <input type="text" name="find" value="<?= old_value('find','','get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
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
            <?php if(user_can('view_outlet')):?>
            <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                <button class="btn btn-bd-primary btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add New</button>
            </a>
            <?php endif?>
            </th>

        </tr>
        <tbody>
            <?php if(!empty($reports)): ?>
            <?php foreach($reports as $report): ?>
               
            <tr>
               
                <td>
                    <?php if(!empty($report->device)): ?>                       
                        <?php foreach($report->device as $device): ?>
                            <?= $device->name ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </td>
                <td >
                    <?= $report->comment ?>
                </td>
                <td >
                    <?= $report->status ?>
                </td>
                
               
                
               
                <td><?= get_date($report->date_created)?></td>
                <td><?= get_date($report->date_updated) ?></td>
                <td>
               <div class="d-flex gap-2">
               <?php if(user_can('view_user_detail')):?>
                    <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $report->id ?>">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-eye"></i>
                        view
                    </button>
                </a>
                <?php endif?>
                <?php if(user_can('edit_user')):?>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $report->id ?>">

                    <button class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </button>
                </a>
                <?php endif?>
                <?php if(user_can('delete_user')):?>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $report->id ?>">
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
            <?php endif ?>
        </tbody>
    </table>
    <!-- <?= $pager->display()?> -->
</div>
<?php else: ?>
    <div class="alert alert-danger text-center">
        Access denied! Please contact admin to view this page
    </div>

<?php endif ?>