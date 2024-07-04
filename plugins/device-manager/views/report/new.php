<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="alert alert-danger d-none">
            </div>
               
                <form onsubmit="submitForm(this,<?=$device->id?>,'report-new',event)" id="saveForm" class="mx-auto row ">
                    <?= csrf() ?>
                    

                   
                        <input hidden type="text" id="reference" name="reference" value="<?= old_value('reference',$device->name .''. $device->model??$device->id) ?>" class="form-control" placeholder="Software Name" aria-label="Usernam" aria-describedby="addon-wrapping">
                        <input hidden  type="text" id="device_id" name="device_id" value="<?= old_value('device_id',$device->id) ?>" class="form-control" placeholder="Software Name" aria-label="Usernam" aria-describedby="addon-wrapping">

                   
                    
                    <div class="col-md-6 mb-3">
                        <label for="device_id" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('status', 'urgent') ?> value="urgent">Urgent</option>
                            <option <?= old_selected('status', 'fair') ?> value="fair">Fair</option>

                        </select>

                    </div>


                    <div class="col-md-12 mb-3">                      
                            <label for="comment" class="form-label">Report</label>
                            <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary" onclick="reportModal.hide()" data-bs-dismiss="reportModal">Close</button>
                        <button type="submit" id="save" class="update btn btn-primary">Report</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>


