<div class="modal" id="newOtherdevice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="createOtherdevice(this,event)" id="OtherdeviceNewForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Device</label>
                        <input type="text" id="name" name="name" value="<?= old_value('name') ?>" class="form-control" placeholder="Device Name" aria-label="name" aria-describedby="addon-wrapping">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select id="location" name="location" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <?php if (!empty($outlets)) : ?>
                                <?php foreach ($outlets as $outlet) : ?>
                                    <option <?= old_selected('location', $outlet->id) ?> value="<?= $outlet->outlet ?>"><?= $outlet->outlet ?></option>

                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="status" class="form-label">Fault?</label>
                        <select id="status" name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('status', '0') ?> value="0">No</option>
                            <option <?= old_selected('status', '1') ?> value="1">Yes</option>

                        </select>
                    </div>



                    <div class="col-md-6 mb-3">
                        <label for="product" class="form-label"> Product</label>
                        <input id="product" type="text" name="product" value="<?= old_value('product') ?>" class="form-control" placeholder="Product" aria-label="product" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="model" class="form-label"> Model</label>
                        <input id="model" type="text" name="model" value="<?= old_value('model') ?>" class="form-control" placeholder="Model" aria-label="model" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sn" class="form-label"> SN</label>
                        <input id="sn" type="text" name="sn" value="<?= old_value('sn') ?>" class="form-control" placeholder="Serial Number" aria-label="sn" aria-describedby="addon-wrapping">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="color" class="form-label">Color</label>
                        <select id="color" name="color" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('color', 'black') ?> value="black">Black</option>
                            <option <?= old_selected('color', 'white') ?> value="white">White</option>
                            <option <?= old_selected('color', 'red') ?> value="red">Red</option>

                        </select>
                    </div>



              <div class="modal-footer">
                            <button type="button" id="close" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save" class="update btn btn-primary">Install</button>
                        </div>
                        
                        
                    </form>
                   

            </div>
        </div>
    </div>
</div>