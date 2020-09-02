<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<style>
    .greet, .comment, .load {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .load > img {
        width: 150px;
    }
</style>
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
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="greet">
                            <h1>Terima Kasih</h1>
                        </div>
                        <div class="comment">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                        </div>
                        <div class="load">
                            <img src="<?=base_url()?>asset/css/ajax_load.gif">
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
	
	<!-- jQuery Plugins -->
  <?php include 'application/views/layouts/jspack.php' ?>
  <script src="<?= base_url()?>assets/theme/js/addon.js"></script>
	<script>
		$(document).ready(function() {
			
            setTimeout(function() {
                window.location.href = '<?= base_url() ?>myprofile/transaction';
            }, 5000);
		})

	
	</script>
</body>
</html>