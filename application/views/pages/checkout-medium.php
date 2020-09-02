<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<CLIENT-KEY>"></script>

<style>

.modal-busy {
	position: fixed;
	z-index: 999;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	background-color: Black;
	filter: alpha(opacity=60);
	opacity: 0.6;
	-moz-opacity: 0.8;
}
.center-busy {
	z-index: 1000;
	margin: 300px auto;
	padding: 0px;
	width: 130px;
	filter: alpha(opacity=100);
	opacity: 1;
	-moz-opacity: 1;
}
.center-busy img {
	height: 128px;
	width: 128px;
}
</style>

<body>

	<!-- MIDTRANS -->
	<form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
		<input type="hidden" name="result_type" id="result-type" value=""></div>
		<input type="hidden" name="result_data" id="result-data" value=""></div>
	</form>

	<!-- HEADER -->
	<?php include 'application/views/layouts/header-medium.php' ?>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<?php include 'application/views/layouts/navbar-medium.php' ?>
	<!-- /NAVIGATION -->

	<!-- loader -->

	<div class="modal-busy" id="loader" style="display: none">
		<div class="center-busy" id="test-git">
			<img alt="" src="<?=base_url()?>asset/css/fancybox_loading@2x.gif" />
		</div>
	</div>

	<!-- end loader -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Checkout</h3>
					<ul class="breadcrumb-tree">
						<li><a href="<?= base_url() ?>homes-medium">Home</a></li>
						<li class="active">Checkout</li>
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

		
		

			<!-- row -->
			<div class="row">

				<div class="col-md-7">
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Shipping Details</h3>
						</div>
						<form action="" id="checkoutForm">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="input" type="text" name="shipping-name" value="<?= $billing->customer_name; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="input" type="email" name="email" value="<?= $billing->customer_email; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="input" type="tel" name="tel" value="<?= $billing->customer_phone; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<select name="province" id="provinsi" class="form-control province-change">
											<option value="0">Pilih Provinsi</option>
											<?php foreach ($provinces['rajaongkir']['results'] as $dt) { ?>
												<option value="<?= $dt["province_id"]; ?>"><?= $dt["province"]; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select name="city" id="kota" class="form-control kota-change">
											<option value="">Pilih Kota</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="address" value="<?= $billing->customer_address; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select name="bank" id="" class="form-control">
											<?php foreach ($bankList as $bank) { ?>
												<option value="<?= $bank->id; ?>"><?= $bank->title; ?> Rek. <?= $bank->rekening; ?> an. <?= $bank->nama; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="order-notes">
										<textarea class="input" name="ordernotes" placeholder="Order Notes"></textarea>
									</div>
								</div>
							</div>
							<input type="hidden" name="provinsi" id="province_name">
							<input type="hidden" name="kota" id="city_name">
							<input type="hidden" name="weight" value="<?= $weightItems; ?>">
							<input type="hidden" name="items" value="<?= $items; ?>">
							<input type="hidden" name="shipping">
							<input type="hidden" name="shipping-cost">
							<input type="hidden" name="sum-cost" value="<?= $checkoutSum; ?>">
						</form>
					</div>
					<!-- /Billing Details -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<div class="order-products">
							<?php foreach ($checkoutItems as $items) { ?>
								<div class="order-col">
									<div>
										<div class="order-img">
											<img src="<?= base_url() ?>admin/assets/product/<?= $items->product_image; ?>" alt="" class="img-responsive">
										</div>
										<?= $items->item_qty; ?>x <?= $items->product_title; ?>
									</div>
									<div>Rp<?= number_format($items->item_qty * $items->product_price); ?></div>
								</div>
							<?php } ?>
						</div>
						<div class="order-col">
							<div>
								Shiping (<?= (float)($weightItems / 1000); ?> Kg)
								<div class="payment-method" id="shipping-list">
								</div>
							</div>
							<div>Rp<span class="shipping-cost">0</span></div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div><strong class="order-total">Rp<?= rupiah($checkoutSum) ?></strong></div>
						</div>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="terms">
						<label for="terms">
							<span></span>
							I've read and accept the <a href="#">terms & conditions</a>
						</label>
					</div>
					<button type="button" class="primary-btn order-submit checkout-proceed">Checkout</button>
				</div>
				<!-- /Order Details -->
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
	<script src="<?= base_url() ?>assets/theme/js/addon.js"></script>
	<script>
		let elProv = document.getElementById('province_name');
		let elCit = document.getElementById('city_name');
		$(document).ready(function() {
			$('.province-change').change(function() {
				getCity($('.province-change').val());
				let textProv = this.options[this.selectedIndex].text;
				elProv.value = textProv;
			});
			$('.kota-change').change(function() {
				getCost();
				let textCity = this.options[this.selectedIndex].text;
				elCit.value = textCity;
			});
			$('#shipping-list').on('change', '.payment-change', function() {
				calculate($(this).val())
				$('[name="shipping"]').val($(this).data('vendor'))
				$('[name="shipping-cost"]').val($(this).val())
			})
			$('.checkout-proceed').click(function() {
				proceed();
			})
		});



		function getCity(ids) {
			$('.kota-change').empty();
			$.ajax({
				type: "GET",
				url: "<?= base_url() ?>Homes/getCities/" + ids,
				dataType: "JSON",
				success: function(data) {
					console.log(data.list);
					var options = '<option value="">Pilih Kota</option>';
					if (data.list.length > 0) {
						$.each(data.list, function(i, item) {
							options += '<option value="' + data.list[i].city_id + '">' + data.list[i].type + ' ' + data.list[i].city_name + '</option>'
						});
						$('.kota-change').append(options);
					} else {
						$('.kota-change').empty();
						alert('Data tidak ditemukan !!!')
					}
				}
			});
		}

		function getCost() {
			// $('.package-change').empty();
			$('.payment-method').empty();
			var destination = $('.kota-change').val();
			var weight = $('[name="weight"]').val();
			var courier = $('.kurir-change').val();
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>Homes/getCost",
				data: {
					destination: destination,
					weight: weight,
					courier: courier
				},
				dataType: "JSON",
				success: function(data) {
					if (data.costList.length > 0) {
						// var options = '<option value="">Pilih Layanan</option>';
						var pay = '';
						var k = 1;
						$.each(data.costList, function(i, field) {
							$.each(data.costList[i].costs, function(j, item) {
								// options += '<option value="'+data.costList[i].costs[j].cost[0].value+'">'+(data.costList[i].code).toUpperCase()+' : '+data.costList[i].costs[j].service+' '+(data.costList[i].costs[j].cost[0].etd).replace('HARI', '')+' hari'+'</option>'

								pay += '<div class="input-radio"><input type="radio" name="payment" id="payment-' + k + '" data-vendor="' + data.costList[i].code + '-' + data.costList[i].costs[j].service + '" value="' + data.costList[i].costs[j].cost[0].value + '" class="payment-change"><label for="payment-' + k + '"><span></span>' + (data.costList[i].code).toUpperCase() + ' ' + data.costList[i].costs[j].service + '(' + data.costList[i].costs[j].description + ')</label><div class="caption"><p>Estimasi ' + (data.costList[i].costs[j].cost[0].etd).replace('HARI', '') + ' hari, tarif: Rp' + data.costList[i].costs[j].cost[0].value + '</p></div></div>'
								k++
							})
						});
						// $('.package-change').append(options);
						$('.payment-method').append(pay);
					} else {
						alert('Data tidak ditemukan !!!')
					}
				},
				error: function() {
					// var options = '<option value="">Pilih Layanan</option>';
					// $('.package-change').append(options);
				}
			});
		}

		function calculate(shipping) {
			// var shipping = $('[name="payment"]').val()
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>Checkoutnew/getCheckoutCost",
				data: {
					shipping: shipping
				},
				dataType: "JSON",
				success: function(data) {
					if (data.shipping != '') {
						$('.shipping-cost').text(data.shipping)
						$('.order-total').text(data.sumall)
					} else {
						alert('Data tidak ditemukan !!!')
					}
				}
			});
		}

		function midPayment(dataSet) {
			console.log(dataSet);
			$.ajax({
				type: 'POST',
				url: '<?= site_url() ?>/checkoutnew/token',
				data: {
					id: dataSet.product_id,
					price: dataSet.product_price,
					quantity: dataSet.item_qty,
					name: dataSet.product_title,
					gross_amount: dataSet.gross_amount,
					shipping: dataSet.shippingcost,

					cusName: dataSet.customer_name,
					cusTelp: dataSet.customer_tlp,
					cusMail: dataSet.customer_mail,
					cusAddress: dataSet.customer_address,
					cusCity: dataSet.customer_kota,

				},
				cache: false,

				success: function(data) {
					//location = data;

					console.log('token = ' + data);

					var resultType = document.getElementById('result-type');
					var resultData = document.getElementById('result-data');

					function changeResult(type, data) {
						$("#result-type").val(type);
						$("#result-data").val(JSON.stringify(data));
						//resultType.innerHTML = type;
						//resultData.innerHTML = JSON.stringify(data);
					}

					snap.pay(data, {

						onSuccess: function(result) {
							changeResult('success', result);
							console.log(result.status_message);
							console.log(result);
							$("#payment-form").submit();
						},
						onPending: function(result) {
							changeResult('pending', result);
							console.log(result.status_message);
							$("#payment-form").submit();
						},
						onError: function(result) {
							changeResult('error', result);
							console.log(result.status_message);
							$("#payment-form").submit();
						}
					});
				}
			});

		}

		function proceed() {
			console.log($('#checkoutForm').serialize());
			
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>Checkoutnew/proceedCheckout",
				data: $('#checkoutForm').serialize(),
				dataType: "JSON",
				beforeSend: function() {
					$("#loader").show();
				},
				complete: function() {
					$("#loader").hide();
				},
				success: function(data) {
					// window.location.href = '<?= base_url() ?>myprofile/transaction';

					// get token midtrans
					midPayment(data);
				}
			});

		}
	</script>
</body>

</html>