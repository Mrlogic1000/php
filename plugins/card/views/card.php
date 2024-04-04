<div class="container" style="margin:20px">
<div class="card" style="width: 18rem;">
  <img src="<?= plugin_http_path('assets/images/image.jpg')?>" class="card-img-top" alt="...">
  <div class="card-body">
    <?php if(!empty($row)): ?>
      <div>ID:<?= $row->id ?></div>
    <div>ID:<?= $row->name ?></div>
    <?php endif ?>
  </div>
</div>
</div>