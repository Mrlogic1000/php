    <?php if (user_can('view_users')) : ?>



        <div class="table-responsive">
            <?php if (!empty(message())) : ?>
                <div class="alert alert-success">
                    <?= message() ?>
                </div>
            <?php endif ?>

            <!-- save add new modal -->

            <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="saveForm" class="mx-auto row ">
                                <?= csrf() ?>
                                <h4 class="my-3">Add New Device</h4>
                                <div class="alert alert-danger d-none">
                
            </div>

                                <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Device</label>
                                    <select name="name" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('name', 'Switch') ?> value="Router">Router</option>
                                        <option <?= old_selected('name', 'Switch') ?> value="Switch">Switch</option>
                                        <option <?= old_selected('name', 'Save') ?> value="Save">Save</option>
                                        <option <?= old_selected('name', 'Access Point') ?> value="Access Point">Access Point</option>
                                        <option <?= old_selected('name', 'TV') ?> value="TV">TV</option>
                                        <option <?= old_selected('name', 'IPTV') ?> value="IPTV">IPTV</option>
                                        <option <?= old_selected('name', 'Camera') ?> value="Camera">Camera</option>
                                        <option <?= old_selected('name', 'Door') ?> value="Door">Door</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sn" class="form-label"> Seria Number</label>
                                    <input type="text" name="sn" value="<?= old_value('sn') ?>" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="IP" class="form-label"> IP</label>
                                    <input type="text" name="ip" value="<?= old_value('ip') ?>" class="form-control" placeholder="IP Address" aria-label="IP" aria-describedby="addon-wrapping">
                                    

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="MAC" class="form-label">MAC</label>
                                    <input type="text" name="mac" value="<?= old_value('mac') ?>" class="form-control" placeholder="MAC Address" aria-label="MAC" aria-describedby="addon-wrapping">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('type', 'Switch') ?> value="Switch">Router</option>
                                        <option <?= old_selected('type', 'Switch') ?> value="Switch">Switch</option>
                                        <option <?= old_selected('type', 'Save') ?> value="Save">Save</option>
                                        <option <?= old_selected('type', 'Access Point') ?> value="Access Point"> Access Point</option>
                                        <option <?= old_selected('type', 'TV') ?> value="TV">TV</option>
                                        <option <?= old_selected('type', 'Camera') ?> value="Camera">Camera</option>
                                        <option <?= old_selected('type', 'Door') ?> value="Door">Door</option>
                                    </select>


                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label">Status</label>
                                    <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('status', 'good') ?> value="good">Good</option>
                                        <option <?= old_selected('status', 'bad') ?> value="faulty">Fauty</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3 col-md-6 ">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" name="model" value="<?= old_value('model') ?>" class="form-control" placeholder="Model" aria-label="Model" aria-describedby="addon-wrapping">


                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control" id="comment" rows="3">
  <?= old_value('comment') ?>
  </textarea>
                                </div>





                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save"  class="save btn btn-primary">Save
                                changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->


            <!-- save edit modal -->

            <div class="modal" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" class="mx-auto row ">
                                <?= csrf() ?>
                                <h4 class="my-3">Edit Device</h4>
                                <input type="text" hidden id="id" name="id" value="" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">
                               

                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">Device</label>
                                    <select id="name" name="name" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('name', 'Router') ?> value="Router">Router</option>
                                        <option <?= old_selected('type', 'Switch') ?> value="Switch">Switch</option>
                                        <option <?= old_selected('name', 'Save') ?> value="Save">Save</option>
                                        <option <?= old_selected('name', 'Access Point') ?> value="Access Point">
                                            Access Point</option>
                                        <option <?= old_selected('name', 'TV') ?> value="TV">TV</option>
                                        <option <?= old_selected('name', 'IPTV') ?> value="IPTV">IPTV</option>
                                        <option <?= old_selected('name', 'Camera') ?> value="Camera">Camera</option>
                                        <option <?= old_selected('name', 'Door') ?> value="Door">Door</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sn" class="form-label"> Seria Number</label>
                                    <input type="text" id="sn" name="sn" value="<?= old_value('sn') ?>" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="IP" class="form-label"> IP</label>
                                    <input type="text" id="ip" name="ip" value="<?= old_value('ip') ?>" class="form-control" placeholder="IP Address" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="MAC" class="form-label">MAC</label>
                                    <input type="text" id="mac" name="mac" value="<?= old_value('mac') ?>" class="form-control" placeholder="MAC Address" aria-label="MAC" aria-describedby="addon-wrapping">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select id="type" name="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('type', 'Router') ?> value="Router">Router</option>
                                        <option <?= old_selected('type', 'Switch') ?> value="Switch">Switch</option>
                                        <option <?= old_selected('type', 'Save') ?> value="Save">Save</option>
                                        <option <?= old_selected('type', 'Access Point') ?> value="Access Point">Access Point</option>
                                        <option <?= old_selected('type', 'TV') ?> value="TV">TV</option>
                                        <option <?= old_selected('type', 'Camera') ?> value="Camera">Camera</option>
                                        <option <?= old_selected('type', 'Door') ?> value="Door">Door</option>
                                        <option <?= old_selected('type', 'Network') ?> value="Network">Network</option>
                                    </select>


                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('status', 'good') ?> value="good">Good</option>
                                        <option <?= old_selected('status', 'bad') ?> value="faulty">Fauty</option>
                                    </select>
                                </div>
                               
                                <div class="mb-3 col-md-6 ">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" id="model" name="model" value="<?= old_value('model') ?>" class="form-control" placeholder="Model" aria-label="Model" aria-describedby="addon-wrapping">


                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control" id="comment" rows="3"><?= old_value('comment') ?></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="editModal">Close</button>
                            <button type="submit" id="save" class="update btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- -------------------------------------------------------------------- -->


            <form class="input-group mb-3 mx-auto">
                <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
                <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
            </form>
           

            <table id="table" class="table table-striped ">
                <tr>

                    <th>Device</th>
                    <th>Type</th>
                    <th>ID</th>
                    <th>ID2</th>
                    <th>Model</th>
                    <th>Status</th>


                    <th>
                        <?php if (user_can('view_users')) : ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" onclick="newModal.show()">
                                Add New
                            </button>

                            <!-- <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                                        <button class="btn btn-bd-primary btn-sm">
                                            <i class="fa-solid fa-plus"></i>
                                            Add New</button>
                                    </a> -->
                        <?php endif ?>

                    </th>

                </tr>
                <tbody>
                    <?php if (!empty($devices)) : ?>
                        <?php foreach ($devices as $device) : ?>
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
                                    <?= $device->model ?? 'Unknown' ?>

                                </td>
                               


                                <td>
                                    <?= $device->status ?>

                                </td>


                                <td>
                                    <div class="d-flex gap-2">
                                    <?php if (user_can('install_device')) : ?>
                                        <button class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-plug"></i>
                                        </button>
                                    <?php endif ?>
                                        <?php if (user_can('view_device_detail')) : ?>
                                            <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/view/<?= $device->id ?>">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                   
                                                </button>
                                            </a>
                                        <?php endif ?>
                                        <?php if (user_can('edit_device')) : ?>

                                            <button id="<?= $device->id ?>" class="edit btn btn-info" onclick="editModal.show()">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                               
                                            </button>
                                        <?php endif ?>
                                        <?php if (user_can('delete_device')) : ?>
                                            <button id="<?= $device->id ?>" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-solid fa-trash"></i>
                                                
                                            </button>


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

        </div>

        </div>
        <!-- mini header -->


        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete your account? This action cannot be undone and you will be unable
                            to recover any data.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancle</button>
                        <button type="button" id="true" data-bs-dismiss="modal" class="confirm btn btn-danger">Yes, delete
                            it!</button>
                    </div>
                </div>
            </div>
        </div>



    <?php else : ?>
        <div class="alert alert-danger text-center">
            Access denied! Please contact admin to view this page
        </div>

    <?php endif ?>
    <script>
 var editModal = new bootstrap.Modal($('#editModal'), {})
        var newModal = new bootstrap.Modal($('#newModal'), {})


        function send_data(formdata,obj){            
            for(key in obj){
                formdata.append(key, obj[key])            }

            $.ajax({
                url: '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add',
                method: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    var db = JSON.parse(response);                  
                    var errors = db.errors;
                    if(db.statusCode == 400){
                        $('.alert').removeClass('d-none')
                        $.each(errors,function(key,error){
                            $('.alert').append('<li>'+key.toUpperCase()+" : "+error+'</li>')                            
                        })
                    }else if(db.statusCode == 200){
                        newModal.hide();
                        location.reload()
                    }
                    

                }

            })

        }
       
       
        $(document).on('click', '#close', function() {
            editModal.hide()
           
           
        })

        $(document).on('submit', '#saveForm', function(e) {
            $("#insertBtn").attr("disabled", "disabled");
            e.preventDefault();
            var formdata = new FormData(this);
         var obj = {form_id:'save'}
            send_data(formdata,obj)
           
        })

        $(document).on('submit', '#editForm', function(e) {
            $("#insertBtn").attr("disabled", "disabled");
            e.preventDefault();
            var formdata = new FormData(this);
            var obj = {'id':id,
                'form_id':'edit'}
            send_data(formdata,obj)
           
           

           
        })


        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            
            var formdata = new FormData();
            var data = {
                'id':id,
                'form_id':'edit'
            } 
            for(key in data){
                formdata.append(key,data[key])
            }    
          

            $.ajax({
                url: '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add',
                method: 'POST',
                data: formdata,
                processData: false,       
                contentType: false,
                success: function(response) {
                    var db = JSON.parse(response);   
                    alert(typeof db)               
                    for(key in db){
                      if(key== 'comment'){  
                                                
                            $(`textarea#${key}`).text(db[key])
                        }
                        $(`#${key}`).val(db[key])
                    }
                                         
              


                }

            })
        })

        function handel_result(){
            
        }


        $(document).on('click', '.delete', function(e) {

            var id = $(this).attr('id');
            var formdata = new FormData();
            formdata.append("form_id", "delete")
            formdata.append("id", id)

            $('.confirm').click(function() {
                var ok = $(this).attr('id')
                console.log(ok)
                if (ok) {
                    $.ajax({
                        url: "<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add",
                        method: 'POST',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            var db = JSON.parse(response);
                            $("#table").load(
                                "<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");


                        }

                    })

                }
            })





        })
    </script>