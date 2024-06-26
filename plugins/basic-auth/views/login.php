<main class="container">
<div class="col-md-6 mx-auto my-3" style="background-color: #ddd;">
    
<form  method="post" class="col-md-6 mx-auto py-4">
   <?php if(!empty(message())): ?>
    <div class="alert alert-success center">

      <?= message('',true)?>

    </div>

    <?php endif ?>
    <?= csrf() ?>

<div class="form-floating mb-3">
  <input name="email" type="email" value="<?= old_value('email')?>" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email address</label>
  <?php if(!empty($errors['email'])): ?>
    <small class="text-danger"><?=$errors['email']?></small> 
    <?php endif ?>
</div>
<div class="form-floating">
  <input name="password" type="password" value="<?= old_value('password')?>" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
  <?php if(!empty($errors['password'])): ?>
    <small class="text-danger"><?=$errors['password']?></small> 
    <?php endif ?>
</div>
<div class="d-flex justify-content-between">
<button type="submit" class="btn btn-primary m-2">Login</button>
<a href="<?=ROOT?>/<?= $vars['signup_page']?>">SignUp</a>
</div>
</form>
</div>

</main>