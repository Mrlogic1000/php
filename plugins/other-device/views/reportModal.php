<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="submitForm(this,null,'new')" id="saveForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <div class="alert alert-danger d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="sn" class="form-label"> Software</label>
                        <input type="text" name="name" value="<?= old_value('name') ?>" class="form-control" placeholder="Software Name" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="sn" class="form-label">Username</label>
                        <input type="text" name="username" value="<?= old_value('username') ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="IP" class="form-label"> Password</label>
                        <input type="text" name="password" value="<?= old_value('password') ?>" class="form-control" placeholder="Password" aria-label="IP" aria-describedby="addon-wrapping">


                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="version" class="form-label">Version</label>
                        <input type="text" name="version" value="<?= old_value('version') ?>" class="form-control" placeholder="version" aria-label="MAC" aria-describedby="addon-wrapping">

                    </div>
                    <div class="modal-footer">
                            <button type="button" id="close" class="btn btn-secondary" onclick="reportModal.hide()" data-bs-dismiss="reportModal">Close</button>
                            <button type="submit" id="save" class="update btn btn-primary">Install</button>
                        </div>


                </form>

            </div>
        </div>
    </div>
</div>