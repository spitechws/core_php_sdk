<?php
require_once('header.php');
?>
<div class="py-5 text-center">
  <img class="d-block mx-auto mb-4" src="<?php echo Helper::asset('assets/images/logo.png') ?>" alt="" width="72" height="57">
  <h2>Login</h2>
</div>

<div class="row g-5">
  <div class="offset-lg-3 col-lg-6">
    <form method="post" action="php/login.php">
      <?php Helper::csrf() ?>
      <?php if (Helper::hasFlush('error')) { ?>
        <div class="alert alert-danger"><?php echo Helper::getFlush('error'); ?></div>
      <?php } ?>
      <div class="form-group mb-3">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
      </div>
      <div class="form-group mb-3">
        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
      </div>
      <button class="w-100 btn btn-primary btn-md" type="submit" name="login">Login</button>
      <div class="mt-3">Don't have an account? <a href="<?php echo Helper::url('register.php') ?>">Register</a></div>
    </form>
  </div>
</div>
<?php require_once('footer.php'); ?>