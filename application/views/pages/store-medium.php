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
							<li class="active">Shop</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Kategori</h3>
							<div class="checkbox-filter">
								<?php 
									foreach ($ctg as $ct) { 
									$ctgList = explode(',', $inCtg);
								?>
									<div class="input-checkbox">
										<input type="checkbox" id="category-<?= $ct->product_category;?>" class="checkbox-check" name="ctg[]" value="<?= $ct->product_category; ?>" 
										<?php if(in_array($ct->product_category, $ctgList)){echo 'checked';}?>
										>
										<label for="category-<?= $ct->product_category;?>">
											<span></span>
											<?= $ct->subsub_name?>
											<small>(<?= $ct->jumlah; ?>)</small>
										</label>
									</div>
								<?php }?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- <div class="aside">
							<h3 class="aside-title">Harga</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number" onchange="test()">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<div>
									<button class="btn btn-primary">Submit</button>
								</div>
							</div>
						</div> -->
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Urutkan:
									<select name="urutan" class="input-select urutan">
										<option value="baru" <?php if($order == "baru"){ echo 'selected';}?>>Terbaru</option>
										<option value="murah" <?php if($order == "murah"){ echo 'selected';}?>>Termurah</option>
									</select>
								</label>

								<!-- <label>
									Tampilkan:
									<select class="input-select">
										<option value="0">9</option>
										<option value="1">18</option>
									</select>
								</label> -->
							</div>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
              <?php foreach ($listdata as $dt) { ?>
                <div class="col-md-4 col-xs-6">
                  <div class="product">
                    <div class="product-img">
                      <img src="<?= base_url()?>admin/assets/product/<?= $dt->product_image;?>" alt="">
                      <div class="product-label">
                      </div>
                    </div>
                    <div class="product-body">
                      <p class="product-category"><?= $dt->subsub_name?></p>
                      <h3 class="product-name to-details" data-tes="<?= $dt->product_url.'.'.$dt->product_id;?>"><a href="#"><?= strtoupper($dt->product_title); ?></a></h3>
                      <h4 class="product-price">Rp<?= number_format($dt->product_price);?></h4>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                      <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                        <button data-tes="<?= $dt->product_url.'.'.$dt->product_id;?>" class="quick-view to-details2"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                      </div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn" type="button" data-itemid="<?= $dt->product_id?>"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                    </div>
                  </div>
                </div>
                <div class="clearfix visible-sm visible-xs"></div>
              <?php } ?>
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing <?= $allcount; ?> products</span>
              <?= $pagination; ?>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
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
      $(function(){
        $('.urutan').change(function(){
          checkUrl();
				})
				$('.checkbox-check').change(function(){
					checkUrl();
				})
      })

      function checkUrl() {
        var base = '<?= base_url()?>shoplist/1';
        const queStr = new URLSearchParams(window.location.search);
				var urut = $('.urutan').val()
				var ctg = [];
				$('.checkbox-check:checked').each(function(i){
					ctg[i] = $(this).val();
				});
				var newUrl = base;
				// alert(queStr.has('search'))
				if(queStr.has('search')) {
					newUrl = newUrl+'?order='+urut+'&ctg='+ctg+'&search='+queStr.get('search');
				}
				else {
					newUrl = newUrl+'?order='+urut+'&ctg='+ctg;
				}
				window.location.href = newUrl;
			}
    </script>
	</body>
</html>