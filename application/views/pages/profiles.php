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

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="list-group">
						<li class="list-group-item text-muted">Menu</li>
						<li class="list-group-item">
							<a href="#">Dashboard</a>
						</li>
						<li class="list-group-item">
							<a href="#">Profil</a>
						</li>
						<li class="list-group-item">
							<a href="#">Transaksi</a>
						</li>
					</ul>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-4">
							<a href="">
								<div class="card-counter primary">
									<i class="fa fa-shopping-cart"></i>
									<span class="count-numbers">12</span>
									<span class="count-name">Keranjang</span>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="">
								<div class="card-counter info">
									<i class="fa fa-archive"></i>
									<span class="count-numbers">12</span>
									<span class="count-name">Proses</span>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="">
								<div class="card-counter success">
									<i class="fa fa-calendar-check-o"></i>
									<span class="count-numbers">12</span>
									<span class="count-name">Terkirim</span>
								</div>
							</a>
						</div>
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
		$(document).ready(function() {
			$('.details-slick').slick();
		});
	</script>
</body>

</html>