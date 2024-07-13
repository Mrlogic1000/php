<div class="modal" id="updateReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Software</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="updateReport(this,event)" id="editForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <input hidden type="text" id="reference" name="reference" value="<?= old_value('reference', $device->name . '' . $device->model ?? $device->id) ?>" class="form-control" placeholder="Software Name" aria-label="Usernam" aria-describedby="addon-wrapping">
                    <input  type="text" id="id" name="id" value="" class="form-control" placeholder="id" aria-label="id" aria-describedby="addon-wrapping">



                    <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
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
                        <button type="button" id="close" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="save" class="update btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>