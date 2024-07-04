<div class="modal fade" id="installDevice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Device</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="saveForm" onsubmit="submitForm(this,<?= $de ?>,'install')" class="mx-auto row ">
                    <?= csrf() ?>
                    <div class="col-md-6 mb-3">
                        <label for="outlet" class="form-label">Outlet</label>
                        <select name="outlet_id" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <?php if (!empty($devices)) : ?>
                                <?php foreach ($outlets as $outlet) : ?>
                                    <option <?= old_selected('device_id', $outlet->id) ?> value="<?= $outlet->id ?>"><?= $outlet->outlet ?></option>

                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="gender" class="form-label">Status</label>
                        <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                            <option <?= old_selected('status', 'good') ?> value="good">Good</option>
                            <option <?= old_selected('status', 'pending') ?> value="pending">Pending</option>
                            <option <?= old_selected('status', 'faulty') ?> value="faulty">Fauty</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="IP" class="form-label"> IP</label>
                        <input type="text" name="ip" value="<?= old_value('ip') ?>" class="form-control" placeholder="IP Address" aria-label="MAC" aria-describedby="addon-wrapping">

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