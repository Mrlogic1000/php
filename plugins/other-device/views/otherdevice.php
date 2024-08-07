
        
        <div class="table-responsive">
                   
                    <div id="errorMessage" class="alert alert-danger d-none">

                    </div>


                    <form class="input-group mb-3 mx-auto">
                        <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
                    </form>

                    <div class="alert alert-success d-none"></div>
                    <?php require plugin_path('views/modal/new.php'); ?>
                    <?php require plugin_path('views/modal/update.php'); ?>
                    <?php require plugin_path('views/modal/delete.php'); ?>

                    <table id="table" class="table table-striped ">
                        <tr>

                            <th>DEVICE</th>
                            <th>SN</th>
                            <th>MODEL</th>
                            <th>PRODUCT</th>
                            <th>COLOR</th>
                            <th>LOCATION</th>
                            <th>STATUS</th>


                            <th>

                                        <button class="btn btn-bd-primary btn-sm" onclick="Otherdevice.display('new')">
                                            <i class="fa-solid fa-plus"></i>
                                            Add New
                                        </button>
                               
                            </th>

                        </tr>
                        <tbody>
                            <?php if (!empty($devices)) : ?>
                                <?php foreach ($devices as $device) : ?>
                                    <tr>

                                        <td><?= $device->name ?> </td>
                                        <td> <?= $device->sn?></td>
                                        <td> <?= $device->model ?> </td>
                                        <td> <?= $device->product ?> </td>
                                        <td> <?= $device->color ?> </td>
                                        <td> <?= $device->location ?> </td>
                                        <td>
                                             <i class="fa-solid fa-microchip  <?= $device->status == 0 ? 'text-success' : 'text-danger' ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $device->status ?>"></i>
                                        </td>
                                       
                                        


                                        <td>
                                            <div class="d-flex gap-2">
                                               
                                                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $device->id ?>">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                    </a>
                                                        <button class="btn btn-warning btn-sm" onclick="Otherdevice.row(<?= $device->id ?>)">
                                                            <i class="fa-solid fa-pen-to-square"></i>                                                          
                                                        </button>
                                                        
                                                    <button id="<?= $device->id ?>" onclick="Otherdevice.delete(<?= $device->id ?>)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

       
            <!-- mini header -->


        </div>


        
    



 <script src="<?=ROOT?>/assets/js/plugin.js">

</script>
<script>
  var url = '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/' 

 

  var Otherdevice = new CRUD(url,'otherdevice');

  function createOtherdevice(data,event){    
    event.preventDefault();
    // console.log("Report")
    Otherdevice.create(data)

  }
  function updateOtherdevice(data,event){    
    event.preventDefault();
    Otherdevice.update(data)

  }
  

  

 
</script>

