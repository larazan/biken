<?php
$backlink = base_url() . "subscribe/manage";
?>

<?php
$email = [];
foreach ($query->result() as $row) {
	$email[] = $row->email;
	$id_contact = $row->id;
}
if ($email != '') {
	$wrap = array_map(
		function ($el) {
			return "<span class=\"vr\">{$el}</span>";
		},
		$email
	);
}
?>

<style>
	.vr {
		background-color: #f5f5f5;
		border: 1px solid #d9d9d9;
		cursor: default;
		display: inline-block;
		font-weight: 600;
		padding: 5px;
		margin: 3px;
		white-space: nowrap;
		-webkit-border-radius: 3px;
		border-radius: 3px;
		min-width: 90px;
	}
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h3 class="m-0 text-dark">Subscribe <small>/ <?= $headline ?></small></h3>

			</div><!-- /.col -->

		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">

				<!-- alert -->
				<?php
				if (isset($flash)) {
					echo $flash;
				}
				?>

				<!-- Horizontal Form -->
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Balas Pesan</h3>
						<a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<?php
					$form_location = base_url() . "subscribe/replyAll";
					?>
					<form class="form-horizontal" method="post" action="<?= $form_location ?>">

						<div class="card-body">
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">To</label>
								<div class="col-sm-6">
									<p class="form-control-static"><?php echo implode(' ', $wrap); ?></p>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Subjek</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="subjek" id="subjek" name="subjek" value="" >
									<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('subjek'); ?></div>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputEmail3" class="col-sm-2 col-form-label">Pesan</label>
								<div class="col-sm-6">
									<textarea class="form-control textarea" rows="3" placeholder="pesan" name="pesan"></textarea>
									<div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('pesan'); ?></div>
								</div>
							</div>

						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="submit" class="btn btn-default" value="Cancel">Cancel</button>
							<button type="submit" name="submit" class="btn btn-info float-right" value="Submit">Send</button>
						</div>
						<!-- /.card-footer -->
					</form>
				</div>
				<!-- /.card -->

			</div>
			<!--/.col (left) -->

		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>