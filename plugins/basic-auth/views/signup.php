<main class="container">
<div class="col-md-6 mx-auto my-3" style="background-color: #ddd;">
    
<form action="" method="post" class="col-md-6 mx-auto py-4">
<div class="form-floating mb-3">
  <input type="first-name"  name="first-name" value="<?= old_value('first-name')?>" class="form-control" id="floatingInput" placeholder="First Name">
  <label for="floatingInput">First Name</label>
  <?php if(!empty($errors['first-name'])): ?>
    <small class="text-danger"><?=$errors['first-name']?></small> 
    <?php endif ?>
</div>
<div class="form-floating mb-3">
  <input type="email" name="last-name" value="<?= old_value('last-name')?>" class="form-control" id="floatingInput" placeholder="Last Name">
  <label for="floatingInput">Last Name</label>
  <?php if(!empty($errors['last-name'])): ?>
    <small class="text-danger"><?=$errors['last-name']?></small> 
    <?php endif ?>
</div>
<div class="form-floating mb-3">
  <input type="email" name="email" value="<?= old_value('email')?>" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email address</label>
  <?php if(!empty($errors['email'])): ?>
    <small class="text-danger"><?=$errors['email']?></small> 
    <?php endif ?>
</div>
<div class="form-floating">
  <input type="password" name="password" value="<?= old_value('password')?>" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
  <?php if(!empty($errors['password'])): ?>
    <small class="text-danger"><?=$errors['password']?></small> 
    <?php endif ?>
</div>
<div class="d-flex justify-content-between">
<button type="button" class="btn btn-primary m-2">Login</button>
<a href="<?=ROOT?>/<?= $vars['login_page']?>">Login</a>
</div>
</form>
</div>

</main>