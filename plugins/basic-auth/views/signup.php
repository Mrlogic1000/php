<main class="container">
<div class="col-md-6 mx-auto my-3" style="background-color: #ddd;">
    
<form method="post" class="col-md-6 mx-auto py-4">
 
<?= csrf() ?>
<div class="form-floating mb-3">
  <input type="text"  name="first_name" value="<?= old_value('first_name')?>" class="form-control" id="floatingInput" placeholder="First Name">
  <label for="floatingInput">First Name</label>
  <?php if(!empty($errors['first_name'])): ?>
    <small class="text-danger"><?=$errors['first_name']?></small> 
    <?php endif ?>
</div>
<div class="form-floating mb-3">
  <input type="text" name="last_name" value="<?= old_value('last_name')?>" class="form-control" id="floatingInput" placeholder="Last Name">
  <label for="floatingInput">Last Name</label>
  <?php if(!empty($errors['last_name'])): ?>
    <small class="text-danger"><?=$errors['last_name']?></small> 
    <?php endif ?>
</div>
<div class="form-float mb-3">
<select name="gender" class="form-select">
  <option value="">--select--</option>
  <option <?=old_selected('gender','male')?> value="male">Male</option>
  <option <?=old_selected('gender','female')?> value="female">Female</option>
</select> 
<?php if(!empty($errors['gender'])): ?>
    <small class="text-danger"><?=$errors['gender']?></small> 
    <?php endif ?>
</div>
<div class="form-floating mb-3">
  <input type="email" name="email" value="<?= old_value('email')?>" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email address</label>

  <?php if(!empty($errors['email'])): ?>
    <small class="text-danger"><?=$errors['email']?></small> 
    <?php endif ?>
</div>
<div class="form-floating mb-3">
  <input type="password" name="password" value="<?= old_value('password')?>" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>

  <?php if(!empty($errors['password'])): ?>
    <small class="text-danger"><?=$errors['password']?></small> 
    <?php endif ?>
</div>

<div class="form-floating mb-3">
  <input type="password" name="retype_password" value="<?= old_value('retype_password')?>" class="form-control" id="floatingPassword" placeholder="Retype Password">
  <label for="floatingPassword">Retype Password</label>

  <?php if(!empty($errors['retype_password'])): ?>
    <small class="text-danger"><?=$errors['retype_password']?></small> 
    <?php endif ?>
</div>

<div class="d-flex justify-content-between">
<button type="submit" class="btn btn-primary m-2">SignUp</button>
<a href="<?=ROOT?>/<?= $vars['login_page']?>">Login</a>
</div>
</form>
</div>

</main>