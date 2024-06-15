<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="saveForm" class="mx-auto row ">
                                <?= csrf() ?>
                                <h4 class="my-3">Add New Device</h4>
                                <div class="alert alert-danger d-none">

                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">Device</label>
                                    <select name="name" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('name', 'Switch') ?> value="Router">Router</option>
                                        <option <?= old_selected('name', 'Switch') ?> value="Switch">Switch</option>
                                        <option <?= old_selected('name', 'Save') ?> value="Save">Save</option>
                                        <option <?= old_selected('name', 'Access Point') ?> value="Access Point">Access Point</option>
                                        <option <?= old_selected('name', 'TV') ?> value="TV">TV</option>
                                        <option <?= old_selected('name', 'IPTV') ?> value="IPTV">IPTV</option>
                                        <option <?= old_selected('name', 'Camera') ?> value="Camera">Camera</option>
                                        <option <?= old_selected('name', 'Door') ?> value="Door">Door</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sn" class="form-label"> Seria Number</label>
                                    <input type="text" name="sn" value="<?= old_value('sn') ?>" class="form-control" placeholder="Serial Number" aria-label="Username" aria-describedby="addon-wrapping">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="IP" class="form-label"> IP</label>
                                    <input type="text" name="ip" value="<?= old_value('ip') ?>" class="form-control" placeholder="IP Address" aria-label="IP" aria-describedby="addon-wrapping">


                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="MAC" class="form-label">MAC</label>
                                    <input type="text" name="mac" value="<?= old_value('mac') ?>" class="form-control" placeholder="MAC Address" aria-label="MAC" aria-describedby="addon-wrapping">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('type', 'Switch') ?> value="Switch">Router</option>
                                        <option <?= old_selected('type', 'Switch') ?> value="Switch">Switch</option>
                                        <option <?= old_selected('type', 'Save') ?> value="Save">Save</option>
                                        <option <?= old_selected('type', 'Access Point') ?> value="Access Point"> Access Point</option>
                                        <option <?= old_selected('type', 'TV') ?> value="TV">TV</option>
                                        <option <?= old_selected('type', 'Camera') ?> value="Camera">Camera</option>
                                        <option <?= old_selected('type', 'Door') ?> value="Door">Door</option>
                                    </select>


                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label">Status</label>
                                    <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                        <option <?= old_selected('status', 'good') ?> value="good">Good</option>
                                        <option <?= old_selected('status', 'bad') ?> value="faulty">Fauty</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6 ">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" name="model" value="<?= old_value('model') ?>" class="form-control" placeholder="Model" aria-label="Model" aria-describedby="addon-wrapping">


                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comment</label>
                                    <textarea name="comment" class="form-control" id="comment" rows="3">
  <?= old_value('comment') ?>
  </textarea>
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