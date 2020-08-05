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
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="list-group">
						<li class="list-group-item text-muted">Menu</li>
						<li class="list-group-item <?php if($this->uri->segment(2) == 'dashboard') { echo 'active';}?>">
							<a href="<?= base_url()?>myprofile/dashboard">Dashboard</a>
						</li>
						<li class="list-group-item <?php if($this->uri->segment(2) == 'profiles') { echo 'active';}?>">
							<a href="<?= base_url()?>myprofile/profiles">Profil</a>
						</li>
						<li class="list-group-item <?php if($this->uri->segment(2) == 'transaction') { echo 'active';}?>">
							<a href="<?= base_url()?>myprofile/transaction">Transaksi</a>
						</li>
					</ul>
				</div>
				<div class="col-md-9">
					<article class="panel panel-default">
            <div class="panel-body">
              <figure class="icontext">
                <div class="icon">
                  <img class="rounded-circle img-sm img-profile-border" src="https://via.placeholder.com/150">
                </div>
                <div class="text">
                  <strong><?= $profiles->customer_name; ?></strong> <br> 
                  <?= $profiles->customer_email; ?><br> 
                  <a href="#" class="btn-link">Edit</a>
                </div>
              </figure>
              <hr>
              <p>
                <i class="fa fa-map-marker text-muted"></i> &nbsp; My address:  
                <br>
                <?= $profiles->customer_address; ?> &nbsp; 
                <a href="#" class="btn-link"> Edit</a>
              </p>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card-counter primary">
                      <i class="fa fa-shopping-cart"></i>
                      <span class="count-numbers">12</span>
                      <span class="count-name">Keranjang</span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card-counter wishlist">
                      <i class="fa fa-heart"></i>
                      <span class="count-numbers">12</span>
                      <span class="count-name">Wishlist</span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card-counter info">
                      <i class="fa fa-archive"></i>
                      <span class="count-numbers">12</span>
                      <span class="count-name">Proses</span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card-counter success">
                      <i class="fa fa-calendar-check-o"></i>
                      <span class="count-numbers">12</span>
                      <span class="count-name">Terkirim</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
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
	<script src="<?= base_url()?>assets/theme/js/addon.js"></script>
</body>

</html>