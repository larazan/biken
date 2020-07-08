<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>

<style>
i.style-toggle-btn {
	position: fixed;
	z-index: 55555;
	top: 100px;
	right: 0;
	color: #FFF;
	background: #777878 /9;
	background: rgba(0, 0, 0, 0.5);
	padding: 10px;
	border-radius: 3px 0 0 3px;
	cursor: pointer;
}
.style-toggle {
	position: fixed;
	z-index: 55555;
	top: 100px;
	right: 0;
	background: #777878 /9;
	background: rgba(0, 0, 0, 0.5);
	padding: 10px;
	border-radius: 3px 0 0 3px;
}
.style-toggle > i {
	color: #FFF;
	cursor: pointer;
}
.style-toggle ul {
	list-style-type: none;
	padding: 0;
	margin: 0;
}
.style-toggle ul > li {
	height: 30px;
	width: 30px;
	border: 1px solid #FFF;
	margin-bottom: 3px;
	cursor: pointer;
}
.style-toggle ul > li.green {
	background: #27ae60;
}
.style-toggle ul > li.blue {
	background: #3498db;
}
.style-toggle ul > li.red {
	background: #e74c3c;
}
.style-toggle ul > li.amethyst {
	background: #9b59b6;
}

/* ===== Style Colors ===== */

/* Text Colors */

.body-green .text-color {
	color: #27ae60;
}
.body-blue .text-color {
	color: #3498db;
}
.body-red .text-color {
	color: #e74c3c;
}
.body-amethyst .text-color {
	color: #9b59b6;
}

/* Link Colors */

.body-green a {
	color: #27ae60;
}
.body-blue a {
	color: #3498db;
}
.body-red a {
	color: #e74c3c;
}
.body-amethyst a {
	color: #9b59b6;
}

/* Border Colors */

.body-green .border-color {
	border-color: #27ae60;
}
.body-blue .border-color {
	border-color: #3498db;
}
.body-red .border-color {
	border-color: #e74c3c;
}
.body-amethyst .border-color {
	border-color: #9b59b6;
}

/* Background Colors */

.body-green .background-color {
	background-color: #27ae60;
}
.body-blue .background-color {
	background-color: #3498db;
}
.body-red .background-color {
	background-color: #e74c3c;
}
.body-amethyst .background-color {
	background-color: #9b59b6;
}
.body-green .bg-hover-color:hover {
	background-color: #229652;
}
.body-blue .bg-hover-color:hover {
	background-color: #2980b9;
}
.body-red .bg-hover-color:hover {
	background-color: #c0392b;
}
.body-amethyst .bg-hover-color:hover {
	background-color: #8e44ad;
}

/* Logo */

.body-green .logo:after {
	color: #27ae60;
}
.body-blue .logo:after {
	color: #3498db;
}
.body-red .logo:after {
	color: #e74c3c;
}
.body-amethyst .logo:after {
	color: #9b59b6;
}

/* Buttons */

.btn-primary, .btn-success, .btn-info, .btn-warning, .bnt-danger, .btn-color {
	color: #FFF !important;
}
.btn-default {
	color: #333 !important;
}
.body-green .btn-link:hover {
	color: #27ae60;
}
.body-blue .btn-link:hover {
	color: #3498db;
}
.body-red .btn-link:hover {
	color: #e74c3c;
}
.body-amethyst .btn-link:hover {
	color: #9b59b6;
}
.body-green .btn-color {
  background-color: #27ae60;
  border-color: #229652;
}
.body-green .btn-color:hover,
.body-green .btn-color:focus,
.body-green .btn-color:active {
  background-color: #229652;
  border-color: #1A7440;
}
.body-blue .btn-color {
  background-color: #3498db;
  border-color: #2980b9;
}
.body-blue .btn-color:hover,
.body-blue .btn-color:focus,
.body-blue .btn-color:active {
  background-color: #2980b9;
  border-color: #1D5C86;
}
.body-red .btn-color {
  background-color: #e74c3c;
  border-color: #c0392b;
}
.body-red .btn-color:hover,
.body-red .btn-color:focus,
.body-red .btn-color:active {
  background-color: #c0392b;
  border-color: #962E22;
}

.body-amethyst .btn-color {
  background-color: #9b59b6;
  border-color: #8e44ad;
}
.body-amethyst .btn-color:hover,
.body-amethyst .btn-color:focus,
.body-amethyst .btn-color:active {
  background-color: #8e44ad;
  border-color: #6C3384;
}
    
</style>

<body class="body-green">
    <!-- HEADER -->
    <?php include 'application/views/layouts/header.php' ?>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <?php include 'application/views/layouts/navbar.php' ?>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Profiles</li>
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

                <!-- Sign In form -->
                <!-- <div class="col-sm-5 col-sm-offset-1">
                    <h3>Sign In to your account</h3>
                    <p class="text-muted">
                        Please fill out the form below to login to your account.
                    </p>
                    <div class="form-white">
                        <form role="form">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-block btn-color btn-xxl">Submit</button>
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
                        <div class="form-avatar hidden-xs">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-user fa-stack-1x"></i>
                            </span>
                        </div>
                    </div>
                </div> -->
                <!-- Sign Up form -->
                <div class="col-sm-5">
                    <h3 class="text-right-xs">Sign Up to your account</h3>
                    <p class="text-muted text-right-xs">
                        Please fill out the form below to create a new account.
                    </p>
                    <div class="form-white">
                        <form role="form">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="email2">Email address</label>
                                <input type="email" class="form-control" id="email2" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="password2">Password</label>
                                        <input type="password" class="form-control" id="password2" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="password2">Repeat password</label>
                                        <input type="password" class="form-control" id="password3" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> I agree to the <a .html#">Terms of Service</a> and <a href=".html#">Privacy Policy</a>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-block btn-color btn-xxl">Create an account</button>
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
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Tentang Kami</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>JL Lesti No.42</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+6221-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <!-- LightWidget WIDGET -->
                            <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/e8f51cd5d39b50879809a08613bf5f58.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>

                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Informasi</h3>
                            <ul class="footer-links">
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Kontak Kami</a></li>
                                <li><a href="#">Kebijakan Privasi</a></li>
                                <li><a href="#">Order dan Refund</a></li>
                                <li><a href="#">Syarat & Ketentuan</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Layanan</h3>
                            <ul class="footer-links">
                                <li><a href="#">Akun</a></li>
                                <li><a href="#">Keranjang</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Tracking Order</a></li>
                                <li><a href="#">Bantuan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <?php include 'application/views/layouts/jspack.php' ?>
    <script>
        $(document).ready(function() {
            $('.details-slick').slick();
        });
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

$('.recent-works .thumbnail > .image').on( 'resize', function () {
    $('.recent-works .thumbnail > .image').height( $('.recent-works .thumbnail > .image').width() / 1.6 );
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

var divs = $("i.random").get().sort(function(){ 
  return Math.round(Math.random())-0.5; //random so we get the right +/- combo
}).slice(0,1)
$(divs).show();

var divs = $("i.random2").get().sort(function(){ 
  return Math.round(Math.random())-0.5; //random so we get the right +/- combo
}).slice(0,1)
$(divs).show();

var divs = $("i.random3").get().sort(function(){ 
  return Math.round(Math.random())-0.5; //random so we get the right +/- combo
}).slice(0,1)
$(divs).show();

// Corporate Index Features
// ========================

$('.crp-ft').hover (function() {
	$(this).children("a").toggleClass("show hidden");
	$(this).children("a").toggleClass("animated flipInX");
	return false;
});

// ** Scrolltopcontrols**/


</script>

</body>

</html>