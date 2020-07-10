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

    .style-toggle>i {
        color: #FFF;
        cursor: pointer;
    }

    .style-toggle ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .style-toggle ul>li {
        height: 30px;
        width: 30px;
        border: 1px solid #FFF;
        margin-bottom: 3px;
        cursor: pointer;
    }

    .style-toggle ul>li.green {
        background: #27ae60;
    }

    .style-toggle ul>li.blue {
        background: #3498db;
    }

    .style-toggle ul>li.red {
        background: #e74c3c;
    }

    .style-toggle ul>li.amethyst {
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

    .btn-primary,
    .btn-success,
    .btn-info,
    .btn-warning,
    .bnt-danger,
    .btn-color {
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

                <!-- alert -->
                <?php
                if (isset($flash)) {
                    echo $flash;
                }
                ?>

                <!-- Sign In form -->
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h3>Sign In to your account</h3>
                    <p class="text-muted">
                        Please fill out the form below to login to your account.
                    </p>
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
                            <button type="submit" class="btn btn-block btn-color btn-xxl" name="submit" value="Submit">Submit</button>
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
                        
                    </div>
                </div>
                

            </div>
        </div>

        <!-- /container -->
    </div>
    <!-- /SECTION -->

  

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
        $(document).ready(function() {
            $('.details-slick').slick();
        });
    </script>
</body>

</html>