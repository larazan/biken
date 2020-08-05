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
          <div class="panel panel-default">
            <div class="panel-body">
              <form action="">
                <div class="row">
                  <div class="col-md-12">
                    <h3>User Profiles</h3>
                  </div>
                </div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input type="text" class="form-control" name="firstname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control" name="lastname">
										</div>
									</div>
                </div>
                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone</label>
											<input type="text" class="form-control" name="phone">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="email">
										</div>
									</div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h3>User Address</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Provinsi</label>
                      <select name="" id="" class="form-control province-change">
                        <option value="0">Pilih Provinsi</option>
                        <?php foreach ($provinces['rajaongkir']['results'] as $dt) { ?>
                          <option value="<?= $dt["province_id"]; ?>"><?= $dt["province"]; ?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kota</label>
                        <select name="city" id="" class="form-control kota-change">
                          <option value="">Pilih Kota</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select name="" id="" class="form-control subdistrict-change">
                        <option value="">Pilih Kecamatan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="text" name="" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" id="" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>
							</form>
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
  <script src="<?= base_url()?>assets/theme/js/addon.js"></script>
</body>

</html>