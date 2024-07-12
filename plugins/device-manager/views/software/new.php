<div class="modal" id="newSoftware" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="submitForm(this,null,'software-new',event)" id="newForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <div class="alert alert-danger d-none">
                    </div>

                    <input hidden type="text" name="device_id" value="<?= old_value('name',$device->id) ?>" class="form-control" placeholder="Software Name" aria-label="Username" aria-describedby="addon-wrapping">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label"> Software</label>
                        <input type="text" name="name" value="<?= old_value('name') ?>" class="form-control" placeholder="Software Name" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" value="<?= old_value('username') ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label"> Password</label>
                        <input type="text" name="password" value="<?= old_value('password') ?>" class="form-control" placeholder="Password" aria-label="IP" aria-describedby="addon-wrapping">


                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="license" class="form-label"> License Code</label>
                        <input type="text" name="license" value="<?= old_value('license') ?>" class="form-control" placeholder="License" aria-label="license" aria-describedby="addon-wrapping">


                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="version" class="form-label">Version</label>
                        <input type="text" name="version" value="<?= old_value('version') ?>" class="form-control" placeholder="version" aria-label="MAC" aria-describedby="addon-wrapping">

                    </div>
                    
                        <div class="col-md-12 mb-3">                      
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                            <button type="button" id="close" class="btn btn-secondary" onclick="newSoftware.hide()" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save" class="update btn btn-primary">Install</button>
                        </div>
                        
                        
                    </form>
                    <button onclick="callModal('new','software','hide');">test</button>

            </div>
        </div>
    </div>
</div>