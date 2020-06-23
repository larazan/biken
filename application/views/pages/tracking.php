<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>

<body>
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

    <style>
        .tracking {
            padding: 80px 0;
            background: #19beda;
        }

        .tracking .content {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .tracking .content h2 {
            color: #243c4f;
            margin-bottom: 40px;
        }

        .tracking .content .form-control {
            height: 50px;
            border-color: #ffffff;
            border-radius: 0;
        }

        .tracking .content.form-control:focus {
            box-shadow: none;
            border: 2px solid #243c4f;
        }

        .tracking .content .btn {
            min-height: 50px;
            border-radius: 0;
            background: #243c4f;
            color: #fff;
            font-weight: 600;
        }
    </style>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- <section class="tracking">
                        <div class="content">
                            <h2>Lacak status dan posisi paket</h2>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Masukkan nomor resi">
                                <span class="input-group-btn">
                                    <button class="btn" type="submit">Cek Resi</button>
                                </span>
                            </div>
                        </div>
                    </section> -->
                    <div id="cp_widget_free"></div>
                    <script src="https://www.cekpengiriman.com/widget/cp_widget.js"></script>
                </div>
                <div class="col-md-2"></div>
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
        $(document).ready(function() {
            $('.details-slick').slick();
        });
    </script>
</body>

</html>