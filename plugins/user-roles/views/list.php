<?php if (user_can('view_roles')) : ?>
    <form method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Role</th>
                <th>Active</th>
                <th><div class="d-flex justify-content-between">
                Permission
                <button class="btn btn-bd-primary btn-sm">
                        <i class="fa-solid fa-save"></i>
                        Save Permission</button>
                </div></th>


                <th>
                <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/add">
                    <button class="btn btn-bd-primary btn-sm">
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
                                <div class="row g-2" >
                                    <?php $perms = array_unique(APP('permissions') ?? []) ?>
                                    <?php if (!empty($perms)) : $num = 0; ?>
                                        <?php foreach ($perms as $perm) : $num++; ?>
                                            <div class="form-check col-md-6" >
                                                <input name="check_<?= $row->id ?>_<?= $num ?>" class="form-check-input" type="checkbox" value="<?= $perm ?>" id="check<?= $num ?><?= $row->id ?>">
                                                <label class="form-check-label" for="check<?= $num ?><?= $row->id ?>" style="cursor:pointer;">
                                                    <?= esc(str_replace("_", " ", $perm)) ?>
                                                </label>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>

                            </td>

                            <td>

                                <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $row->id ?>">

                                    <button class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                </a>
                                <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/delete/<?= $row->id ?>">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Delete
                                    </button>
                                </a>
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