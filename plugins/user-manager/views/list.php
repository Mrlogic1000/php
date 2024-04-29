<?php if(user_can('view_users')): ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Image</th>
            <th>Gender</th>
            <!-- <th>Roles</th> -->
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>
                <button class="btn btn-bd-primary btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add New</button>
            </th>
        </tr>
        <tbody>
            <?php if(!empty($rows)): ?>
            <?php foreach($rows as $row): ?>
            <tr>
                <td>#</td>
                <td>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $row->id ?>">
                    <?= esc($row->first_name) ?>
                </a>
                </td>
                <td>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $row->id ?>">
                    <?= $row->last_name ?>
                </a>
                </td>
                <td><img src="<?= get_image($row->image) ?>" class="img-thumbnail" alt=""
                style="width: 80px; height: 80px; object-fit:cover"
                >            
            </td>
                <td><?= ucfirst($row->gender) ?>

                <td><?php if(!empty($row->roles)):?>
                <?php foreach($row->roles as $role):?>
                    <div>
                    <?= $role ?>
                    </div>
                <?php endforeach?>
                <?php endif?>
                </td>
                <td><?= get_date($row->date_created)?></td>
                <td><?= get_date($row->date_updated) ?></td>
                <td>
                    <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $row->id ?>">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-eye"></i>
                        view
                    </button>
                </a>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $row->id ?>">

                    <button class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </button>
                </a>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $row->id ?>">
                    <button class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Delete
                    </button>
                </a>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?php else: ?>
    <div class="alert alert-danger text-center">
        Access denied! Please contact admin to view this page
    </div>

<?php endif ?>