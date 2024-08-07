<div class="table-responsive">    

    <?php require plugin_path('views/new.php'); ?>
    <?php require plugin_path('views/update.php'); ?>
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

            <th>Assign</th>
            <th>Status</th>
            <th>Descrition</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Date Created</th>
           
            <th>
                <button type="button" class="btn btn-primary" onclick="Task.display('new')">
                    Add New
                </button>

            </th>

        </tr>
        <tbody>
            <?php if (!empty($tasks)) : ?>
                <?php foreach ($tasks as $task) : ?>
                    <tr>

                        
                        <td><?= $task->assign ?></td>
                        <td><?= $task->status?></td>
                        <td><?= $task->comment ?></td>
                        <td><?= get_date($task->startdate) ?></td>
                        <td><?= get_date($task->enddate) ?></td>
                        <td><?= get_date($task->date_created) ?></td>                       

                        <td>
                            <i class="fa-solid fa-microchip  <?= $task->status == 0 ? 'text-success' : 'text-danger' ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $task->status ?>"></i>
                        </td>

                        <td>
                            <div class="d-flex gap-2">

                                <button class="btn btn-primary btn-sm" >
                                    <i class="fa-solid fa-plug"></i>
                                </button>
                                <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $task->id ?>">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-eye"></i>

                                    </button>
                                </a>

                                <button id="<?= $task->id ?>" class="edit btn btn-info" onclick="Task.row('<?= $task->id ?>','task-row',event)">
                                    <i class="fa-solid fa-pen-to-square"></i>

                                </button>
                               
                                    <button id="<?= $task->id ?>" onclick="Task.delete(<?= $task->id ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-trash"></i>

                                    </button>


                               
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

<script src="<?= ROOT ?>/assets/js/plugin.js">

</script>
<script>
    var url = '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/'

    var Task = new CRUD(url, 'task');




    function createTask(data, event) {
        event.preventDefault();
        Task.create(data)

    }

    function updateTask(data, event) {
        event.preventDefault();
        Task.update(data)
    }
</script>