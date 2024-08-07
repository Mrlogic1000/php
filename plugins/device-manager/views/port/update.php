<div class="modal" id="updatePort" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Software</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit=" updatePort(this,event)" id="portUpdateForm" class="mx-auto row ">
                    <?= csrf() ?>
                   
                        <div hidden class="col-md-12 mb-3">
                            <label for="id" class="form-label">Port</label>
                            <input  type="text" id="device_id" name="device_id" value="<?= old_value('device_id') ?>" class="form-control" placeholder="Port Name" aria-label="id" aria-describedby="addon-wrapping">
                        </div>
                        <div hidden class="col-md-12 mb-3">
                            <label for="id" class="form-label">Port</label>
                            <input  type="text" id="id" name="id" value="<?= old_value('port') ?>" class="form-control" placeholder="Port Name" aria-label="id" aria-describedby="addon-wrapping">
                        </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="port" class="form-label">Port</label>
                        <select name="port" id="port" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                        <?php for($i =1; $i<9; $i++): ?>
                            <option  value="Ether<?= $i?>">Ether<?= $i?></option>
                            <?= $i?>
                        <?php endfor?>
                        </select>
                        <!-- <input  type="text" id="port" name="port" value="<?= old_value('port') ?>" class="form-control" placeholder="Port Name" aria-label="Usernam" aria-describedby="addon-wrapping"> -->


                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="type" class="form-label">Port Type</label>
                        <select id="type" name="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option  value="trunk">Trunk</option>
                            <option  value="normal">Normal</option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="neigbor_id" class="form-label">Neigbor</label>
                        <select id="neigbor_id" name="neigbor_id" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <?php if(!empty($neigbors)): ?>
                            <?php foreach($neigbors as $neigbor):?>
                                <option  value="<?= $neigbor->id?>"><?= $neigbor->name?></option>
                            <?php endforeach ?>
                            <?php endif ?>
                           
                        </select>

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