<div class="modal" id="updateTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="updateTask(this,event)" id="taskUpdateForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <div class="alert alert-danger d-none">
                    </div>

                    <div hidden class="col-md-12 mb-3">
                        <label for="assign" class="form-label"> Task</label>
                        <input type="text" id="id" name="id" value="<?= old_value('id') ?>" class="form-control" placeholder="Assign" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="assign" class="form-label"> Task</label>
                        <input type="text" id="assign" name="assign" value="<?= old_value('assign') ?>" class="form-control" placeholder="Assign" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="startdate" class="form-label">Start Date</label>
                        <input type="date" id="startdate" name="startdate" value="<?= old_value('startdate') ?>" class="form-control" placeholder="Start Date" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="enddate" class="form-label"> End Date</label>
                        <input type="date" id="enddate" name="enddate" value="<?= old_value('enddate') ?>" class="form-control" placeholder="End Date" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option  value="pending">Pending</option>
                            <option  value="compeleted">Compeleted</option>
                            <option  value="progress">Progress</option>

                        </select>


                    </div>

                   
                    
                        <div class="col-md-12 mb-3">                      
                            <label for="comment" class="form-label">Description</label>
                            <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                            <button type="button" id="close" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save" class="update btn btn-primary">Update</button>
                        </div>
                        
                        
                    </form>
                    <button onclick="callModal('new','software','hide');">test</button>

            </div>
        </div>
    </div>
</div>