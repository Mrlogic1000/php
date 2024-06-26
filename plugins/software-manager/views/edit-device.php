<?php if (!empty($device)) : ?>
    <div class="row mx-auto  ">
        <?php if (!empty($errors)) : ?>

            <?php foreach ($errors as $error) : ?>
                <div class="alert alert-success">
                    <?= $error ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>


        <form class="row g3 col-md-5 mx-auto shadow p-3 " method="post">
            <?= csrf() ?>
            <h4 class="my-3">Edit Device</h4>
            <?php if (!empty($errors)) : ?>
                <h6>Errors</h6>
                <?php foreach ($errors as $error) : ?>
                    <div class="text-danger">
                        <?= $error ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Device Name</label>
                <input type="text" name="name" value="<?= old_value('name', $device->name) ?>" class="form-control" placeholder="Device Name" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <div class="col-md-6 mb-3">
                <label for="sn" class="form-label"> Seria Number</label>
                <input type="text" name="sn" value="<?= old_value('sn', $device->sn) ?>" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">

            </div>
            <div class="col-md-6 mb-3">
                <label for="IP" class="form-label"> IP</label>
                
                <select name="ip" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                    <?php if (!empty($all_ip)) : 
                      
                        ?>
                        
                        <?php foreach ($all_ip as $ip) : 
                            ?>
                            
                            <option <?=  $device->ip ==  $ip ? ' selected ':''?> <?= old_selected('type', $ip) ?> value="<?= $ip ?>"> <?= $ip ?></option>
                           
                        <?php endforeach ?>
                    <?php endif ?>

                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="mac" class="form-label">MAC</label>
                <input type="text" name="mac" value="<?= old_value('mac', $device->mac) ?>" class="form-control" placeholder="MAC Address" aria-label="mac" aria-describedby="addon-wrapping">

            </div>
            <div class="col-md-6 mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="type" name="type" value="<?= old_value('type', $device->type) ?>" class="form-control" placeholder="Type" aria-label="type" aria-describedby="addon-wrapping">


            </div>

            <div class="mb-3 col-md-6">
                <label for="gender" class="form-label">Status</label>
                <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                    <option <?= old_selected('status', 'good', $device->status) ?> value="good">Good</option>
                    <option <?= old_selected('status', 'bad', $device->status) ?> value="faulty">Fauty</option>
                </select>
            </div>


            <div class="mb-3 col-md-6 ">
                <label for="install" class="form-label">Version</label>
                <input type="number" name="version" value="<?= old_value('version', $device->version??'') ?>" class="form-control" placeholder="Version" aria-label="type" aria-describedby="addon-wrapping">


            </div>
            <div class="mb-3 col-md-6 ">
                <label for="model" class="form-label">Model</label>
                <input type="text" name="model" value="<?= old_value('model', $device->model??'') ?>" class="form-control" placeholder="Model" aria-label="Model" aria-describedby="addon-wrapping">


            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea name="comment" class="form-control" id="comment" rows="3">
                <?= old_value('comment', $device->comment??'') ?>
              </textarea>
            </div>


            <div class="d-flex justify-content-between">
                <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>">
                    <button type="button" class="btn btn-primary">
                        <i class="fa-solid fa-chevron-left"></i>
                        Back
                    </button>
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-save"></i>Save

                </button>
            </div>
        </form>


    </div>
<?php else : ?>
    <div class="alert alert-danger text-center">
        No recodes found
    <?php endif ?>