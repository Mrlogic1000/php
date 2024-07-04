<div class="modal" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="submitForm(this,null,'edit',event)" id="editForm" class="mx-auto row ">
                    <?= csrf() ?>
                    <h4 class="my-3">Edit Device</h4>
                    <input type="text" hidden id="id" name="id" value="" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">



                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Color</label>
                        <select id="name" name="name" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('name', 'router') ?> value="router">Route</option>
                            <option <?= old_selected('name', 'switch') ?> value="switch">Switch</option>
                            <option <?= old_selected('name', 'AP') ?> value="AP">AP</option>
                            <option <?= old_selected('name', 'firewall') ?> value="firewall">FireWall</option>
                            <option <?= old_selected('name', 'camera') ?> value="camera">Cameara</option>
                            <option <?= old_selected('name', 'Other') ?> value="other">Other</option>

                        </select>
                    </div>
                   
                   

                    <div class="col-md-6 mb-3">
                        <label for="mac1" class="form-label"> MAC1</label>
                        <input type="text" id="mac1" name="mac1" value="<?= old_value('mac1') ?>" class="form-control" placeholder="MAC1" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="MAC2" class="form-label">MAC2</label>
                        <input type="text" id="mac2" name="mac2" value="<?= old_value('mac2') ?>" class="form-control" placeholder="MAC Address" aria-label="MAC2" aria-describedby="addon-wrapping">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fcc_id" class="form-label">FDD ID</label>
                        <input type="text" id="fcc_id" name="fcc_id" value="<?= old_value('fcc_id') ?>" class="form-control" placeholder="MAC Address" aria-label="fcc_id" aria-describedby="addon-wrapping">

                    </div>
                    <div class="mb-3 col-md-6 ">
                        <label for="ip" class="form-label">IP</label>
                        <input id="ip" type="text" name="ip" value="<?= old_value('ip') ?>" class="form-control" placeholder="IP Address" aria-label="ip" aria-describedby="addon-wrapping">

                    </div>


                    <div class="mb-3 col-md-6">
                        <label for="status" class="form-label">Fauty?</label>
                        <select id="status" name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('status', '0') ?> value="0">No</option>
                            <option <?= old_selected('status', '1') ?> value="1">Yes</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="color" class="form-label">Color</label>
                        <select id="color" name="color" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('color', 'black') ?> value="black">Black</option>
                            <option <?= old_selected('color', 'white') ?> value="white">White</option>
                            <option <?= old_selected('color', 'red') ?> value="red">Red</option>
                            <option <?= old_selected('color', 'other') ?> value="other">Other</option>

                        </select>
                    </div>

                    <div class="mb-3 col-md-6 ">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" id="model" name="model" value="<?= old_value('model') ?>" class="form-control" placeholder="Model" aria-label="Model" aria-describedby="addon-wrapping">
                        

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sn" class="form-label"> Seria Number</label>
                        <input type="text" id="sn" name="sn" value="<?= old_value('sn') ?>" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">

                    </div>
                    <div class="mb-3 col-md-6 ">
                        <label for="location" class="form-label">Location</label>
                        <select id="location" name="location" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <?php if (!empty($outlets)) : ?>
                                <?php foreach ($outlets as $outlet) : ?>
                                    <option <?= old_selected('location', $outlet->outlet) ?> value="<?= $outlet->outlet ?>"><?= $outlet->outlet ?></option>
                                <?php endforeach ?>
                            <?php endif ?>


                        </select>

                    </div>

                    <div class="mb-3 col-md-6 ">
                        <label for="product" class="form-label">Product</label>
                        <select id="product" name="product" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('product', 'mikrotik') ?> value="mikrotik">Mikrotik</option>
                            <option <?= old_selected('product', 'cisco') ?> value="cisco">CISCO</option>
                            <option <?= old_selected('product', 'tp-link') ?> value="tp-link">TP-LINK</option>
                            <option <?= old_selected('product', 'D-LINK') ?> value="D-LINK">D-LINK</option>
                            <option <?= old_selected('product', 'hikvision') ?> value="hikvision">Hikvision</option>
                            <option <?= old_selected('product', 'other') ?> value="other">Other</option>

                        </select>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="editModal">Close</button>
                <button type="submit" id="save" class="update btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>