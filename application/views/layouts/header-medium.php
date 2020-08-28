    <header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +6221-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> JL Lesti No.42</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-money"></i> Rp</a></li>
						<?php
						if ($this->session->userdata('userId') != '') {
						?>
							<li><a href="<?=base_url()?>myprofile/dashboard"><i class="fa fa-user-o"></i> Akun Anda</a></li>
							<li><a href="<?=base_url()?>account/logout"> Logout</a></li>
						<?php } else {
						?>
						<li><a href="<?=base_url()?>login"><i class="fa fa-user-o"></i> Login</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="<?= base_url()?>assets/theme/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<input class="input main-search-input" placeholder="Cari disini">
									<button class="search-btn main-search" type="button">Cari disini</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Wishlist</span>
										<div class="qty">0</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Keranjang</span>
										<div class="qty">
											<span class="cartqty" name="cartqty"><?= $cart; ?></span>
										</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list" id="cartdropdownlist">
											<?= $cartList; ?>
										</div>
										<div class="cart-summary">
											<!-- <small>3 Barang dipilih</small> -->
											<h5>SUBTOTAL: Rp<span name="subcartlist"><?= $subCartList; ?></span></h5>
										</div>
										<div class="cart-btns">
											<a href="<?= base_url()?>mycart">Keranjang</a>
											<a href="<?= base_url()?>ordercheckout">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>