<?php if (user_can('view_users')) : ?>

<div class="table-responsive">

    <form class="input-group mb-3 mx-auto">
        <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control"
            aria-label="Amount (to the nearest dollar)">
        <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
    </form>

    <table class="table table-striped ">
        
        <tr>


            <th>Name </th>
            <th>VLAN ID </th>
            <th>CIDR </th>
            <th>IP </th>
            <th><div> <?php if (user_can('view_outlet')) : ?>
            <a class="mb-2" href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                <button class="btn btn-bd-primary btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add New</button>
            </a>
            <?php endif ?>
        </div></th>




        </tr>
        <tbody>
            <?php foreach ($vlans as $vlan) : ?>
            <tr>
                <td> <?= esc($vlan->name) ?> </td>
                <td> <?= esc($vlan->vlan_id) ?> </td>
                <td> <?= esc($vlan->cidr) ?> </td>
                <td> <?= esc($vlan->ip) ?> </td>
                <td>
                <?php if(user_can('view_user_detail')):?>
                    <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $vlan->id ?>">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-eye"></i>
                        view
                    </button>
                </a>
                <?php endif?>

                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $vlan->id ?>">

                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                    </a>
                    <!-- Button trigger modal -->
                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $vlan->id ?>">
                        <button type="button" class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Delete
                        </button>
                    </a>

                </td>
            </tr>


            <?php endforeach ?>


        </tbody>
    </table>




    <!-- <?= $pager->display() ?> -->
</div>
<?php else : ?>
<div class="alert alert-danger text-center">
    Access denied! Please contact admin to view this page
</div>

<?php endif ?>