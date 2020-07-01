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
								<!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/e8f51cd5d39b50879809a08613bf5f58.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>

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
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
</body>

</html>