
<div class="table-responsive">

<form class="input-group mb-3 mx-auto">  
  <input type="text" name="find" value="<?= old_value('find','','get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
  <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
</form>

    <table class="table table-striped ">
        <tr>
           
            <th>First Name</th>
            <th>Last Name</th>
            <th>Image</th>
            <th>Gender</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>
           
            <a  href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                <button class="btn btn-bd-primary btn-sm">
                    <i class="fa-solid fa-plus"></i>
                    Add New</button>
            </a>
          
            </th>

        </tr>
        <tbody>
            <?php if(!empty($rows)): ?>
            <?php foreach($rows as $row): ?>
            <tr>
               
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
                style="width: 80px; height: 80px; object-fit:cover">            
            </td>
                <td><?= ucfirst($row->gender) ?></td>
                
               
                <td><?= get_date($row->date_created)?></td>
                <td><?= get_date($row->date_updated) ?></td>
                <td>
               <div class="d-flex gap-2">
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
               </div>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
    <?= $pager->display()?>
</div>
