<!DOCTYPE html>
<html lang="en">
  <?php include 'application/views/layouts/head.php' ?>
	<body>
		<!-- HEADER -->
		<?php include 'application/views/layouts/header-standard.php' ?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<?php include 'application/views/layouts/navbar-standard.php' ?>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="<?= base_url()?>assets/theme/img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Koleksi<br>Laptop</h3>
								<a href="<?= base_url()?>shop/1?order=baru&ctg=24" class="cta-btn">Beli sekarang <i class="fa fa-arrow-circle-right"></i></a>
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
								<a href="<?= base_url()?>shop/1?order=baru&ctg=26" class="cta-btn">Beli sekarang <i class="fa fa-arrow-circle-right"></i></a>
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
								<a href="<?= base_url()?>shop/1?order=baru&ctg=27" class="cta-btn">Beli sekarang <i class="fa fa-arrow-circle-right"></i></a>
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
                    <?php foreach ($items as $dt) { ?>
                      <div class="product">
                        <div class="product-img">
                          <img src="<?= base_url()?>admin/assets/product/<?= $dt["pic"];?>" alt="">
                          <div class="product-label">
                            <span class="new">Baru</span>
                          </div>
                        </div>
                        <div class="product-body">
                          <p class="product-category"><?= $dt["ctg"]?></p>
                          <h3 class="product-name"><a href="<?= base_url()?>electro/<?= $dt["url"];?>"><?= $dt["title"]; ?></a></h3>
                          <h4 class="product-price">Rp<?= number_format($dt["price"]);?></h4>
                          <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
                            <button data-tes="<?= $dt["url"];?>" class="quick-view to-details"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></ onclick="alert('clicked')">
                          </div>
                        </div>
                      </div>
                    <?php }?>
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
							<a class="primary-btn cta-btn" href="<?= base_url();?>shop/1">Belanja Sekarang</a>
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
                    <?php foreach ($items as $dt) { ?>
                      <div class="product">
                        <div class="product-img">
                          <img src="<?= base_url()?>admin/assets/product/<?= $dt["pic"];?>" alt="">
                          <div class="product-label">
                            
                          </div>
                        </div>
                        <div class="product-body">
                          <p class="product-category"><?= $dt["ctg"]?></p>
                          <h3 class="product-name"><a href="<?= base_url()?>electro/<?= $dt["url"];?>"><?= $dt["title"]; ?></a></h3>
                          <h4 class="product-price">Rp<?= number_format($dt["price"]);?></h4>
                          <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">tambah ke wishlist</span></button>
                            <button data-tes="<?= $dt["url"];?>" class="quick-view to-details"><i class="fa fa-eye"></i><span class="tooltipp">detail</span></button>
                          </div>
                        </div>
                      </div>
                    <?php }?>
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
    <script>
      $(function(){
        $('.to-details').click(function(){
          var ids = $(this).data('tes')
          urls = '<?= base_url('')?>electro/'+ids;
          window.open(urls);
        })
				$('.main-search').click(function(){
					window.location.href = '<?= base_url()?>shop/1?&search='+$('.main-search-input').val();
				});
      })
    </script>

	</body>
</html>