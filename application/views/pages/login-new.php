<!DOCTYPE html>
<html lang="en">
  <?php include 'application/views/layouts/head.php' ?>
  <body class="body-green">
    <!-- HEADER -->
    <?php include 'application/views/layouts/header-medium.php' ?>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <?php include 'application/views/layouts/navbar-medium.php' ?>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb-tree">
              <li><a href="<?= base_url()?>homes-medium">Home</a></li>
              <li class="active">Sign In</li>
            </ul>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <div class="row">
          <!-- alert -->
          <?php if($this->session->flashdata('item')) echo $this->session->flashdata('item'); ?>
          <!-- Sign In form -->
          <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h3>Sign In to your account</h3>
            <p class="text-muted">Please fill out the form below to login to your account.</p>
            <div class="form-white">
              <form role="form" action="<?=base_url()?>account/submit_login" method="post">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="username" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="pword" required placeholder="Password">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" value="remember-me"> Remember me
                  </label>
                </div>
                <button type="submit" class="btn btn-block btn-success" name="submit" value="Submit">Submit</button>
              </form>
              <hr>
              <p><a href=".html#" id="lost-btn">Lost your password?</a></p>
              <div class="hidden" id="lost-form">
                <p>Enter your email address and we will send you a link to reset your password.</p>
                <form role="form">
                  <div class="form-group">
                    <label for="email-lost">Email address</label>
                    <input type="email" class="form-control" id="email-lost" placeholder="Enter email">
                  </div>
                  <button type="submit" class="btn btn-default">Send</button>
                </form>
              </div>
              <p><a href="<?= base_url()?>register" id="lost-btn">Create an Account?</a></p>
            </div>
          </div>
        </div>
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

  

    <!-- jQuery Plugins -->
    <?php include 'application/views/layouts/jspack.php' ?>
    <script src="<?= base_url()?>assets/theme/js/addon.js"></script>
</body>

</html>