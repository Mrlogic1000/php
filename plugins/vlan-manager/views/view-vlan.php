<?php if (user_can('view_users')) : ?>

<div class="table-responsive">

    <form class="input-group mb-3 mx-auto">
        <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
        <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
    </form>

    

          
                <div class="alert alert-success">
                <?= esc($vlan->name) ?>(<?= esc($vlan->vlan_id) ?>)
                <a href="<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/edit/<?= $vlan->id ?>">

                        <button class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit
                        </button>
                    </a>
                    </div>

                    
                </div>
                
           

       
            <?php if (!empty($vlan)) : ?>

              
                   
                        <div class="card p-2" style="display: grid; gap:20px; grid-template-columns: repeat(8, auto); ">
                            <?php $ips = getEachIpInRange("$vlan->ip/$vlan->cidr") ?>
                            <?php foreach ($ips as $ip) : ?>
                             
                             <div>   <?= $ip ?></div>
                           
                            <?php endforeach ?>
                        </div>
             
            <?php endif ?>
      



    <!-- <?= $pager->display() ?> -->
</div>
<?php else : ?>
<div class="alert alert-danger text-center">
    Access denied! Please contact admin to view this page
</div>

<?php endif ?>