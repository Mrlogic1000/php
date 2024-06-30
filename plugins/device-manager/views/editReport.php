<div class="modal" id="editReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="submitForm(this,null,'software-update',event)" id="editForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <div class="alert alert-danger d-none">
                    </div>

                    <input hidden type="text" id="id" name="id" value="<?= old_value('id') ?>" class="form-control" placeholder="Software Name" aria-label="Username" aria-describedby="addon-wrapping">
                    <div class="col-md-12 mb-3">
                        <label for="sn" class="form-label"> Software</label>
                        <input type="text" id="name" name="name" value="<?= old_value('name') ?>" class="form-control" placeholder="Software Name" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" value="<?= old_value('username') ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="IP" class="form-label"> Password</label>
                        <input type="text" id="password" name="password" value="<?= old_value('password') ?>" class="form-control" placeholder="Password" aria-label="IP" aria-describedby="addon-wrapping">


                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="license" class="form-label"> License Code</label>
                        <input type="text" id="license" name="license" value="<?= old_value('license') ?>" class="form-control" placeholder="License" aria-label="license" aria-describedby="addon-wrapping">


                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="version" class="form-label">Version</label>
                        <input type="text" id="version" name="version" value="<?= old_value('version') ?>" class="form-control" placeholder="version" aria-label="MAC" aria-describedby="addon-wrapping">

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary" onclick="editReport.hide()" data-bs-dismiss="editReport">Close</button>
                        <button type="submit" id="save" class="update btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>