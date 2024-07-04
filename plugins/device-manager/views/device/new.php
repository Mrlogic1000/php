<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form onsubmit="submitForm(this,null,'device-new',event)" id="saveForm" class="mx-auto row ">
                                <?= csrf() ?>
                                <h4 class="my-3">Add New Device</h4>
                                <div class="alert alert-danger d-none">

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">Device</label>
                                    <select name="name" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('name', 'router') ?> value="router">Route</option>
                                        <option <?= old_selected('name', 'switch') ?> value="switch">Switch</option>
                                        <option <?= old_selected('name', 'AP') ?> value="AP">AP</option>
                                        <option <?= old_selected('name', 'firewall') ?> value="firewall">FireWall</option>
                                        <option <?= old_selected('name', 'Other') ?> value="other">Other</option>
                                       
                                    </select>
                                </div>  
                            

                                <div class="col-md-6 mb-3">
                                    <label for="mac1" class="form-label"> MAC1</label>
                                    <input type="text" name="mac1" value="<?= old_value('mac1') ?>" class="form-control" placeholder="MAC Address" aria-label="mac1" aria-describedby="addon-wrapping">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="MAC2" class="form-label">MAC2</label>
                                    <input type="text" name="mac2" value="<?= old_value('mac2') ?>" class="form-control" placeholder="MAC Address" aria-label="MAC2" aria-describedby="addon-wrapping">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fcc_id" class="form-label">FCC ID</label>
                                    <input type="text" name="fcc_id" value="<?= old_value('fcc_id') ?>" class="form-control" placeholder="FCC ID" aria-label="fcc_id" aria-describedby="addon-wrapping">
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="ip" class="form-label">IP</label>
                                    <input type="text" name="ip" value="<?= old_value('ip') ?>" class="form-control" placeholder="IP Address" aria-label="ip" aria-describedby="addon-wrapping">

                                </div>

                                <div class="mb-3 col-md-6 ">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" name="model" value="<?= old_value('model') ?>" class="form-control" placeholder="Model" aria-label="Model" aria-describedby="addon-wrapping">

                                </div>
                              
                                <div class="col-md-6 mb-3">
                                    <label for="sn" class="form-label"> Seria Number</label>
                                    <input type="text" name="sn" value="<?= old_value('sn') ?>" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">

                                </div>


                                <div class="mb-3 col-md-6 ">
                                    <label for="location" class="form-label">Location</label>
                                    <select name="location" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <?php if(!empty($outlets)): ?>                                            
                                        <?php foreach($outlets as $outlet): ?>
                                            <option <?= old_selected('location', $outlet->outlet) ?> value="<?= $outlet->outlet?>"><?= $outlet->outlet?></option>
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

                                <div class="col-md-6 mb-3">
                                    <label for="color" class="form-label">Faulty?</label>
                                    <select name="color" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('color', '0') ?> value="0">No</option>
                                        <option <?= old_selected('color', '1') ?> value="1">Yes</option>
                                       
                                    </select>
                                </div>                    
                                <div class="col-md-6 mb-3">
                                    <label for="color" class="form-label">Color</label>
                                    <select name="color" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('color', 'black') ?> value="black">Black</option>
                                        <option <?= old_selected('color', 'white') ?> value="white">White</option>
                                        <option <?= old_selected('color', 'red') ?> value="red">Red</option>
                                       
                                    </select>
                                </div>                    
                               
                                
                                
                               

                                
                                




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="save" class="save btn btn-primary">Save
                                changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>