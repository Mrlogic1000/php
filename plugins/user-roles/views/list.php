<?php if (user_can('view_roles')) : ?>
    <form method="post">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>
                        <div class="d-flex justify-content-between">
                            Permission
                            <button class="btn btn-bd-primary btn-sm">
                                <i class="fa-solid fa-save"></i>
                                Save Permission</button>
                        </div>
                    </th>


                    <th>
                        <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                            <button type="button" class="btn btn-bd-primary btn-sm">
                                <i class="fa-solid fa-plus"></i>
                                Add New
                            </button>
                        </a>
                    </th>
                </tr>
                <tbody>
                    <?php if (!empty($rows)) : ?>
                        <?php foreach ($rows as $row) : ?>

                            <tr>
                                <td>#</td>
                                <td>
                                    <?= esc($row->role) ?>

                                </td>
                                <td>
                                    <?= $row->disable ? 'No' : 'Yes' ?>
                                </td>
                                <td style="max-width: 300px;">
                                    <div class="row g-2">
                                        <?php $perms = array_unique(APP('permissions') ?? []) ?>
                                        <?php if (!empty($perms)) : $num = 0; ?>
                                            <?php foreach ($perms as $perm) : $num++; ?>
                                                <div class="form-check col-md-6">

                                                    <input <?= in_array($perm, $row->permissions ?? []) ? ' checked ' : '' ?> name="check_<?= $row->id ?>_<?= $num ?>" class="form-check-input" type="checkbox" value="<?= $perm ?>" id="check<?= $num ?><?= $row->id ?>">
                                                    <label class="form-check-label" for="check<?= $num ?><?= $row->id ?>" style="cursor:pointer;">
                                                        <?= esc(str_replace("_", " ", $perm)) ?>
                                                    </label>
                                                </div>
                                                <!-- <div class="modal fade" id="staticBackdrop<?= $row->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel"><?= $row->id ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure want to delete <strong><?= $row->role ?></strong> role</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $row->id ?>">
                                                                    <button type="button" class="btn btn-primary">Delete</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>

                                </td>

                                <td>

                                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $row->id ?>">

                                        <button type="button" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $row->id ?>">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Delete
                                        </button>
                                    </a>
                                    <!-- Modal -->

                                    <!-- <button type="button" class="btn btn-danger btn-sm">
                                          
                                        </button>
                                    </a> -->
                                </td>
                            </tr>

                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </form>
<?php else : ?>
    <div class="alert alert-danger text-center">
        Access denied! Please contact admin to view this page
    </div>

<?php endif ?>