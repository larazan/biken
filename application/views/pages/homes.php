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

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= base_url()?>assets/theme/img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Koleksi<br>Laptop</h3>
								<a href="#" class="cta-btn">Beli sekarang <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= base_url()?>assets/theme/img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Koleksi<br>Aksesoris</h3>
								<a href="#" class="cta-btn">Beli sekarang <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= base_url()?>assets/theme/img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Koleksi<br>Kamera</h3>
								<a href="#" class="cta-btn">Beli sekarang <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Produk Terbaru</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptop</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphone</a></li>
									<li><a data-toggle="tab" href="#tab1">Kamera</a></li>
									<li><a data-toggle="tab" href="#tab1">Aksesoris</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product01.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">Baru</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Laptop SNSV Core i7</a></h3>
												<h4 class="product-price">Rp11.5juta <del class="product-old-price">Rp13juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product02.png" alt="">
												<div class="product-label">
													<span class="new">Baru</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Headphone LBJ</a></h3>
												<h4 class="product-price">Rp1.5juta <del class="product-old-price">Rp2juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product03.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Laptop PH Core i7</a></h3>
												<h4 class="product-price">Rp8juta <del class="product-old-price">Rp9juta</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product04.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Tablet Erca</a></h3>
												<h4 class="product-price">Rp3juta <del class="product-old-price">Rp3.5juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product05.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Headphone Sona</a></h3>
												<h4 class="product-price">Rp900ribu <del class="product-old-price">Rp1.5juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Belanja Sekarang</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product06.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">Baru</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Laptop SMI Core i7</a></h3>
												<h4 class="product-price">Rp12juta <del class="product-old-price">Rp13juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product07.png" alt="">
												<div class="product-label">
													<span class="new">Baru</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Sumsang A20</a></h3>
												<h4 class="product-price">Rp8juta <del class="product-old-price">Rp9juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product08.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Laptop SNSV Core i7</a></h3>
												<h4 class="product-price">Rp8juta <del class="product-old-price">Rp10juta</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product09.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Camera Handy 1280px</a></h3>
												<h4 class="product-price">Rp850ribu <del class="product-old-price">Rp1juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="<?= base_url()?>assets/theme/img/product01.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Kategori</p>
												<h3 class="product-name"><a href="#">Laptop BMI Core i7</a></h3>
												<h4 class="product-price">Rp13juta <del class="product-old-price">Rp15juta</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">bandingkan</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> tambah keranjang</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
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

	</body>
</html>