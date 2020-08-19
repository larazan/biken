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
							<li><a href="<?= base_url()?>homes-standard">Home</a></li>
							<li><a href="<?= base_url()?>shop/1">Shop</a></li>
							<li class="active"><?= $itemData->product_title?></li>
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
              <!-- multi image -->
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
              <!-- end multi image -->
              <!-- single image -->
              <!-- <div class="">
                <img src="<?= base_url()?>admin/assets/product/<?= $itemData->product_image;?>" alt="" class="img-responsive">
              </div> -->
              <!-- end single image -->
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
                <input type="number" id="add-to-cart-qty" class="form-control" value="1">
              </div>
              <div class="add-to-cart">
                <button type="button" class="add-to-cart-btn" data-itemid="<?= $itemData->product_id?>">Add to Cart</button>
              </div>
            </div>
            <div style="display: flex;">
              <p><i class="fa fa-heart-o"></i><span class="tooltipp"> tambah ke wishlist</span></p>
            </div>
            <div>
              <h4>Cek Ongkir</h4>
              <div class="row">
                <div class="col-md-8">
                  <form action="">
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
                          <label >Kota</label>
                          <select name="" id="" class="form-control kota-change">
                            <option value="">Pilih Kota</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Kurir</label>
                          <select name="" id="" class="form-control kurir-change">
                            <option value="">Pilih Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Berat(gram)</label>
                          <input type="text" name="berat" value="<?= $itemData->product_weight;?>" class="form-control berat-change" readonly>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 tbl-hasil">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Layanan</th>
                        <th>ETD</th>
                        <th>Tarif</th>
                      </tr>
                    </thead>
                    <tbody id="tarif-body"></tbody>
                  </table>
                </div>
              </div>
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
            <!-- <li class="nav-item">
              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
            </li> -->
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
            <!-- <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="home-tab">
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
            </div> -->
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
    <script>
      $(document).ready(function(){
        $('.details-slick').slick();
        $('.province-change').change(function(){
          getCity($('.province-change').val());
        });
        $('.kurir-change').change(function(){
          getCost();
        });
        $('.main-search').click(function(){
					window.location.href = '<?= base_url()?>shop/1?&search='+$('.main-search-input').val();
				});
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
                options += '<option value="'+data.list[i].city_id+'">'+data.list[i].city_name+'</option>'
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
        $('#tarif-body').empty();
        var destination = $('.kota-change').val();
        var weight = $('.berat-change').val();
        var courier = $('.kurir-change').val();
        $.ajax({
          type:"POST",
          url:"<?= base_url()?>Homes/getCost",
          data: {destination: destination, weight: weight, courier: courier},
          dataType: "JSON",
          success:function(data){
            if(data.costList.length > 0) {
              var html = ""
              $.each(data.costList, function(i, item){
                html += '<tr>'
                html += '<td><h4>'+data.costList[i].service+'</h4><span>'+data.costList[i].description+'</span></td>'
                html += '<td>'+data.costList[i].cost[0].etd+' days</td>'
                html += '<td>'+data.costList[i].cost[0].value+'</td></tr>'
              });
              $('#tarif-body').append(html);
            }
            else {
              $('#tarif-body').empty();
              alert('Data tidak ditemukan !!!')
            }
          }
        });
      }
    </script>
	</body>
</html>