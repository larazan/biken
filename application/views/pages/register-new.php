<!DOCTYPE html>
<html lang="en">
  <?php include 'application/views/layouts/head.php' ?>
  <body>
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
              <li class="active">Register</li>
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
          <!-- Sign Up form -->
          <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h3 class="text-right-xs">Register an Account</h3>
            <p class="text-muted text-right-xs">Please fill out the form below to create a new account.</p>
            <div class="form-white">
              <form role="form" method="post" action="<?= base_url() ?>account/signup_process">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Your name">
                </div>
                <div class="form-group">
                  <label for="email2">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="mobile">Phone Number</label>
                  <input type="phone" class="form-control" id="mobile" name="mobile" placeholder="Mobile Phone">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="password2">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                      <label for="password2">Repeat password</label>
                      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Repeat Password">
                    </div>
                  </div>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="agree" value="Agree"> I agree to the <a .html#">Terms of Service</a> and <a href=".html#">Privacy Policy</a>
                  </label>
                </div>
                <button type="submit" name="submit" value="Submit" class="btn btn-block btn-success">Create an account</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <?php include 'application/views/layouts/newsletter.php' ?>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <?php include 'application/views/layouts/footer.php' ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <?php include 'application/views/layouts/jspack.php' ?>
    <script>
    </script>

    <script>
        /**  Custom JS ** /
 * 
 * /*------------------------------------------------------------------
Project:	theglobemasters
Version:	1.1.1
Created: 	29/08/17
-------------------------------------------------------------------*/

        // Recent works thumbnail image height resize
        //===========================================

        $('.recent-works .thumbnail > .image').on('resize', function() {
            $('.recent-works .thumbnail > .image').height($('.recent-works .thumbnail > .image').width() / 1.6);
        }).resize();

        // Sign In & Sign Out
        // ==================

        $('#sign-in').on('click', function() {
            $("#user-bar").toggleClass("show hidden");
            $("#user-bar").toggleClass("animated flipInX");
            $("#sign-in").toggleClass("hidden show");
            $("#sign-up").toggleClass("hidden show");
            $("#sign-in").removeClass("animated flipInX");
            $("#sign-up").removeClass("animated flipInX");
            return false;
        });

        $('#sign-out').on('click', function() {
            $("#user-bar").toggleClass("show hidden");
            $("#user-bar").toggleClass("animated flipInX");
            $("#sign-in").toggleClass("hidden show");
            $("#sign-in").addClass("animated flipInX");
            $("#sign-up").toggleClass("hidden show");
            $("#sign-up").addClass("animated flipInX");
            return false;
        });

        // Style Toggle
        // ============

        $('.style-toggle-btn').on('click', function() {
            $(".style-toggle-btn").toggleClass("show hidden");
            $(".style-toggle").toggleClass("hidden show");
            return false;
        });

        $('.style-toggle-close').on('click', function() {
            $(".style-toggle-btn").toggleClass("show hidden");
            $(".style-toggle").toggleClass("hidden show");
            return false;
        });

        // Body Style Change
        // =================

        $('.style-toggle ul > li.green').on('click', function() {
            $("body").addClass("body-green");
            $("body").removeClass("body-blue");
            $("body").removeClass("body-red");
            $("body").removeClass("body-amethyst");
            return false;
        });

        $('.style-toggle ul > li.blue').on('click', function() {
            $("body").addClass("body-blue");
            $("body").removeClass("body-green");
            $("body").removeClass("body-red");
            $("body").removeClass("body-amethyst");
            return false;
        });

        $('.style-toggle ul > li.red').on('click', function() {
            $("body").addClass("body-red");
            $("body").removeClass("body-green");
            $("body").removeClass("body-blue");
            $("body").removeClass("body-amethyst");
            return false;
        });

        $('.style-toggle ul > li.amethyst').on('click', function() {
            $("body").addClass("body-amethyst");
            $("body").removeClass("body-blue");
            $("body").removeClass("body-red");
            $("body").removeClass("body-green");
            return false;
        });

        // Lost password
        // =============

        $('#lost-btn').on('click', function() {
            $("#lost-form").toggleClass("show hidden");
            return false;
        });

        // Contact Us
        // ==========

        $('#signed-in').on('click', function() {
            $(".form-white > .contact-avatar > span").toggleClass("show hidden");
            $(".form-white > .contact-avatar > img").toggleClass("show hidden animated flipInX");
            return false;
        });

        $('#signed-in').on('click', function() {
            $("#email-contact").toggleClass("show hidden");
            $("#email-contact-disabled").toggleClass("show hidden");
            $("#name-1").toggleClass("show hidden");
            $("#name-1-disabled").toggleClass("show hidden");
            $("#name-2").toggleClass("show hidden");
            $("#name-2-disabled").toggleClass("show hidden");
            return false;
        });

        $('#signed-in').on('click', function() {
            $("#signed-in > i").toggleClass("fa-circle-o fa-dot-circle-o");
            return false;
        });

        // Search box toggle
        // =================
        $('#search-btn').on('click', function() {
            $("#search-icon").toggleClass('fa-search fa-times margin-2');
            $("#search-box").toggleClass('hidden show animated flipInX');
            return false;
        });

        // Error page
        // ==========

        var divs = $("i.random").get().sort(function() {
            return Math.round(Math.random()) - 0.5; //random so we get the right +/- combo
        }).slice(0, 1)
        $(divs).show();

        var divs = $("i.random2").get().sort(function() {
            return Math.round(Math.random()) - 0.5; //random so we get the right +/- combo
        }).slice(0, 1)
        $(divs).show();

        var divs = $("i.random3").get().sort(function() {
            return Math.round(Math.random()) - 0.5; //random so we get the right +/- combo
        }).slice(0, 1)
        $(divs).show();

        // Corporate Index Features
        // ========================

        $('.crp-ft').hover(function() {
            $(this).children("a").toggleClass("show hidden");
            $(this).children("a").toggleClass("animated flipInX");
            return false;
        });

        // ** Scrolltopcontrols**/
    </script>

</body>

</html>