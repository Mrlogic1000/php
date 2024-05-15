<?php if(user_can('view_users')): ?>
<div class="table-responsive">

<form class="input-group mb-3 mx-auto">  
  <input type="text" name="find" value="<?= old_value('find','','get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
  <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
</form>

    <table class="table table-striped ">
        <tr>
           
            <th>Name</th>
            <th>Description</th>
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
            <?php if(!empty($outlets)): ?>
            <?php foreach($outlets as $outlet): ?>
            <tr>
               
                <td>
                    <?= esc($outlet->name) ?>
                </td>
                <td>
                    <?= $outlet->description ?>
                </td>
                
               
                
               
                <td><?= get_date($outlet->date_created)?></td>
                <td><?= get_date($outlet->date_updated) ?></td>
                <td>
               <div class="d-flex">
               <?php if(user_can('view_user_detail')):?>
                    <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $outlet->id ?>">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-eye"></i>
                        view
                    </button>
                </a>
                <?php endif?>
                <?php if(user_can('edit_user')):?>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $outlet->id ?>">

                    <button class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </button>
                </a>
                <?php endif?>
                <?php if(user_can('delete_user')):?>
                <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $outlet->id ?>">
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