<div class="modal" id="updateReport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Software</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="updateReport(this,event)" id="reportUpdateForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <div hidden class="col-md-12 mb-3">
                        <input type="text" id="id" name="id" value="<?= old_value('id') ?>" class="form-control" placeholder="id" aria-label="Username" aria-describedby="addon-wrapping">
                       
                    </div>
                    
                

                    <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option  value="urgent">Urgent</option>
                            <option  value="fair">Fair</option>

                        </select>


                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="comment" class="form-label">Report</label>
                        <textarea  class="form-control" id="comment" name="comment" rows="3"></textarea>
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