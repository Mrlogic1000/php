<div class="modal" id="updateOutlet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="updateOutlet(this,event)" id="outletUpdateForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <div class="alert alert-danger d-none">
                    </div>

                    <div class="col-md-12 mb-3">
                        <input hidden type="text" id="id" name="id" value="<?= old_value('id') ?>" class="form-control" placeholder="Software Name" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label"> Outlet</label>
                        <input type="text" id="outlet" name="outlet" value="<?= old_value('outlet') ?>" class="form-control" placeholder="Software Name" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>

                   
                    
                        <div class="col-md-12 mb-3">                      
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3">
                            value="<?= old_value('description') ?>"
                            </textarea>
                    </div>
                    <div class="modal-footer">
                            <button type="button" id="close" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save" class="update btn btn-primary">Update</button>
                        </div>
                        
                        
                    </form>
                   

            </div>
        </div>
    </div>
</div>