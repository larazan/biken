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
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Items</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?= $orderList; ?>
                  </tbody>
                </table>
              </div>
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
	<div class="modal fade" id="uploadBukti" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
					<div class="row">
						<div class="col-md-12" id="imgproof"></div>
					</div>
					<form action="<?= base_url()?>Dashboard/uploadBukti"  method="post" enctype="multipart/form-data">
						<input type="hidden" name="modalids" id="">
						<div class="form-group">
							<label>Bukti Transfer</label>
							<input type="file" name="bukti" id="bukti" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-sm btn-primary" type="submit">Submit</button>
						</div>
					</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
	<!-- jQuery Plugins -->
  <?php include 'application/views/layouts/jspack.php' ?>
  <script src="<?= base_url()?>assets/theme/js/addon.js"></script>
	<script>
		$(document).ready(function() {
			$('.btn-upload-bukti').click(function(){
				$('[name="modalids"]').val($(this).data('ids'))
				getPaymentProof($(this).data('ids'))
				$('#uploadBukti').modal('show')
			})
		})

		function getPaymentProof(ids) {
			$.ajax({
        type:"GET",
        url:"<?= base_url()?>Dashboard/getBuktiBayar/"+ids,
        dataType: "JSON",
        success:function(data){
					$('#imgproof').append(data.img)
        }
      });
		}
	</script>
</body>
</html>