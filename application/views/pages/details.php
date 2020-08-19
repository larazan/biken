<!DOCTYPE html>
<html lang="en">
  <?php

use function PHPSTORM_META\type;

include 'application/views/layouts/head.php' ?>
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
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Product Details</li>
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
          <div class="col-md-6">
            <div class="details-slick">
              <?php

              $path = base_url().'admin/assets/product/';
              // image
              $arr_img = $itemData->filename;
              $images = unserialize($arr_img);
              for ($i=0; $i < count($images) ; $i++) { 
              ?>
              <div class="">
                <img src="<?= $path.$images[$i] ?>" alt="" class="img-responsive">
              </div>
              <?php } ?>

              <!-- <div class="">
                <img src="<?= base_url()?>admin/assets/product/<?= $itemData->product_image;?>" alt="" class="img-responsive">
              </div>
              <div class="">
                <img src="<?= base_url()?>assets/theme/img/product05.png" alt="" class="img-responsive">
              </div>
              <div class="">
                <img src="<?= base_url()?>assets/theme/img/product04.png" alt="" class="img-responsive">
              </div> -->
            </div>
          </div>
          <div class="col-md-6 product-detail-title">
            <h3><?= strtoupper($itemData->product_title);?></h3>
            <div style="display: flex;">
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <span class="reviews">10 reviews</span>
            </div>
            <div style="display: flex;">
              <h3 class="price">
                Rp<?= number_format($itemData->product_price); ?>
                <!-- <del class="price-del">Rp13juta</del> -->
                <span class="stock-status"><?= ($itemData->product_quantity > 0)?'IN STOCK':'OUT OF STOCK'; ?></span>
              </h3>
            </div>
            <div class="short-description">
              <?php
                if (strlen($itemData->product_description) >= 100) {
                  echo substr($itemData->product_description, 0, 100). " ... " . substr($itemData->product_description, -5);
                }
                else {
                  echo $itemData->product_description;
                }
              ?>
            </div>
            <div class="add-to-cart">
              <label for="">Qty</label>
              <div class="col-md-2">
                <input type="number" name="" id="" class="form-control" value="1">
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn">tambah keranjang</button>
              </div>
            </div>
            <div style="display: flex;">
              <p><i class="fa fa-heart-o"></i><span class="tooltipp"> tambah ke wishlist</span></p>
            </div>
          </div>
        </div>
        <div class="row">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="col-md-12">
                <?= $itemData->product_description; ?>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="home-tab">
              <br>
              <div class="col-md-8 col-md-offset-2">
                <table class="table">
                  <tbody>
                    <?php
                      $dat = unserialize($itemData->product_specification);
                      foreach ($dat as $dt) {
                    ?>
                      <tr><td><?= $dt["name"]; ?></td><td><?= $dt["value"]; ?></td></tr>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="home-tab">
              <br>
              <div class="col-md-9 col-md-offset-1">
                <div class="row">
                  <div class="col-md-3 product-detail-review">
                    <h4>John Doe</h4>
                    <span>08-06-2020</span>
                    <div class="product-rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde quam sequi, sed assumenda iusto natus delectus recusandae, nesciunt voluptatibus magni deserunt placeat nulla tempore molestias at libero totam laboriosam quae?</p>
                  </div>
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

		<!-- jQuery Plugins -->
		<?php include 'application/views/layouts/jspack.php' ?>
    <script>
      $(document).ready(function(){
        $('.details-slick').slick();
      });
    </script>
	</body>
</html>