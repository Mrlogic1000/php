<div class="table-responsive">

    <form class="input-group mb-3 mx-auto">
        <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
        <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
    </form>
    <?php require plugin_path('views/new.php'); ?>
    <?php require plugin_path('views/update.php'); ?>
    <?php require plugin_path('views/delete.php'); ?>
    <table class="table table-striped ">
        <tr>

            <th>Name</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>


                <button onclick="Outlet.display('new')" class="btn btn-bd-primary btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add New</button>


            </th>

        </tr>
        <tbody>
            <?php if (!empty($outlets)) : ?>
                <?php foreach ($outlets as $outlet) : ?>
                    <tr>

                        <td>
                            <?= esc($outlet->outlet) ?>
                        </td>
                        <td>
                            <?= $outlet->description ?>
                        </td>




                        <td><?= get_date($outlet->date_created) ?></td>
                        <td><?= get_date($outlet->date_updated) ?></td>
                        <td>
                            <div class="d-flex gap-2">


                                    <button onclick="Outlet.row('<?= $outlet->id?>')" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                        
                                    </button>



                                    <button onclick="Outlet.row('<?= $outlet->id?>')" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                       
                                    </button>
                               


                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                        
                                    </button>
                               

                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
   
</div>


<script src="<?= ROOT ?>/assets/js/plugin.js"></script>
<script>
    var url = '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/'

    var Outlet = new CRUD(url, 'outlet');




    function createOutlet(data, event) {
        event.preventDefault();
        Outlet.create(data)

    }

    function updateOutlet(data, event) {
        event.preventDefault();
        Outlet.update(data)
    }
</script>