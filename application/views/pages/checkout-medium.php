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
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="<?= base_url()?>homes-medium">Home</a></li>
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
											<input class="input" type="text" name="shipping-name" value="<?= $billing->customer_name;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="input" type="email" name="email" value="<?= $billing->customer_email;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input class="input" type="text" name="address" value="<?= $billing->customer_address;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="province" id="" class="form-control province-change">
                        <option value="0">Pilih Provinsi</option>
                        	<?php foreach ($provinces['rajaongkir']['results'] as $dt) { ?>
                          	<option value="<?= $dt["province_id"]; ?>"><?= $dt["province"]; ?></option>
                          <?php }?>
                    	</select>
										</div>
									</div>
									<div class="col-md-6">
										<select name="city" id="" class="form-control kota-change">
                      <option value="">Pilih Kota</option>
                    </select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<select name="courier" id="" class="form-control kurir-change">
                      	<option value="">Pilih Kurir</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                      </select>
										</div>
									</div>
									<div class="col-md-6">
										<select name="package" id="" class="form-control package-change">
                      <option value="">Pilih Layanan</option>
                    </select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input class="input" type="tel" name="tel" value="<?= $billing->customer_phone;?>">
										</div>
									</div>
									<div class="col-md-6">
										<select name="bank" id="" class="form-control">
											<?php foreach ($bankList as $bank) { ?>
												<option value="<?= $bank->id; ?>"><?= $bank->title; ?> Rek. <?= $bank->rekening; ?> an. <?= $bank->nama; ?></option>
											<?php }?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="order-notes">
											<textarea class="input" name="ordernotes" placeholder="Order Notes"></textarea>
										</div>
									</div>
								</div>
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
										<div><?= $items->item_qty;?>x <?= $items->product_title;?></div>
										<div>Rp<?= number_format($items->item_qty*$items->product_price);?></div>
									</div>
								<?php }?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div>Rp<span class="shipping-cost">0</span></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total"><?= $checkoutSum;?></strong></div>
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
		<script src="<?= base_url()?>assets/theme/js/addon.js"></script>
    <script>
      $(document).ready(function() {
				$('.province-change').change(function(){
          getCity($('.province-change').val());
        });
				$('.kota-change').change(function(){
          getCost();
        });
				$('.kurir-change').change(function(){
          getCost();
        });
				$('.package-change').change(function(){
					calculate()
				})
				$('.checkout-proceed').click(function(){
					proceed()
				})
      });
			function getCity(ids) {
        $('.kota-change').empty();
        $.ajax({
          type:"GET",
          url:"<?= base_url()?>Homes/getCities/"+ids,
          dataType: "JSON",
          success:function(data){
            console.log(data.list);
            var options = '<option value="">Pilih Kota</option>';
            if(data.list.length > 0) {
              $.each(data.list, function(i, item){
                options += '<option value="'+data.list[i].city_id+'">'+data.list[i].type+' '+data.list[i].city_name+'</option>'
              });
              $('.kota-change').append(options);
            }
            else {
              $('.kota-change').empty();
              alert('Data tidak ditemukan !!!')
            }
          }
        });
      }
			function getCost() {
        $('.package-change').empty();
        var destination = $('.kota-change').val();
        var weight = 1000//$('.berat-change').val();
        var courier = $('.kurir-change').val();
        $.ajax({
          type:"POST",
          url:"<?= base_url()?>Homes/getCost",
          data: {destination: destination, weight: weight, courier: courier},
          dataType: "JSON",
          success:function(data){
            if(data.costList.length > 0) {
							var options = '<option value="">Pilih Layanan</option>';
							$.each(data.costList, function(i, item){
                options += '<option value="'+data.costList[i].cost[0].value+'" data-etd="'+data.costList[i].cost[0].etd+'"><strong>'+data.costList[i].service+'</strong> '+data.costList[i].description+'</option>'
              });
              $('.package-change').append(options);
            }
            else {
              alert('Data tidak ditemukan !!!')
            }
          }
        });
      }
			function calculate() {
				var shipping = $('.package-change').val()
				$.ajax({
          type:"POST",
          url:"<?= base_url()?>Checkoutnew/getCheckoutCost",
          data: {shipping: shipping},
          dataType: "JSON",
          success:function(data){
            if(data.shipping != '') {
							$('.shipping-cost').text(data.shipping)
							$('.order-total').text(data.sumall)
            }
            else {
              alert('Data tidak ditemukan !!!')
            }
          }
        });
			}
			function proceed() {
				$.ajax({
          type:"POST",
          url:"<?= base_url()?>Checkoutnew/proceedCheckout",
          data: $('#checkoutForm').serialize(),
          dataType: "JSON",
          success:function(data){
            alert('aaaa')
          }
        });
			}
    </script>
	</body>
</html>