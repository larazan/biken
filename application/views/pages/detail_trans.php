<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<style>
    .form-group.trans {
        margin-bottom: 0em;
    }

    h3.h3 {
        text-align: center;
        margin: 1em;
        text-transform: capitalize;
        font-size: 1.7em;
    }

  

    /********************* Shopping Demo-2 **********************/
    .demo {
        padding: 45px 0
    }

    .product-grid2 {
        font-family: 'Open Sans', sans-serif;
        position: relative
    }

    .product-grid2 .product-image2 {
        overflow: hidden;
        position: relative
    }

    .product-grid2 .product-image2 a {
        display: block
    }

    .product-grid2 .product-image2 img {
        width: 100%;
        height: auto
    }

    .product-image2 .pic-1 {
        opacity: 1;
        transition: all .5s
    }

   

   

    .product-grid2 .add-to-cart {
        color: #fff;
        background-color: #404040;
        font-size: 15px;
        text-align: center;
        width: 100%;
        padding: 10px 0;
        display: block;
        position: absolute;
        left: 0;
        bottom: -100%;
        transition: all .3s
    }

    .product-grid2 .add-to-cart:hover {
        background-color: #3498db;
        text-decoration: none
    }

    .product-grid2:hover .add-to-cart {
        bottom: 0
    }

    .product-grid2 .product-new-label {
        background-color: #3498db;
        color: #fff;
        font-size: 17px;
        padding: 5px 10px;
        position: absolute;
        right: 0;
        top: 0;
        transition: all .3s
    }

    .product-grid2:hover .product-new-label {
        opacity: 0
    }

    .product-grid2 .product-content {
        padding: 20px 10px;
        text-align: center
    }

    .product-grid2 .title {
        font-size: 17px;
        margin: 0 0 7px
    }

    .product-grid2 .title a {
        color: #303030
    }

    .product-grid2 .title a:hover {
        color: #3498db
    }

    .product-grid2 .price {
        color: #303030;
        font-size: 15px
    }

    @media screen and (max-width:990px) {
        .product-grid2 {
            margin-bottom: 30px
        }
    }
</style>
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
                        
                    <div class="row">
            <!-- left column -->
            <div class="col-md-6">

                <!-- Horizontal Form -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                   

                    <div class="card-body">
                        <div class="form-group trans row">
                            <label for="order_id" class="col-sm-3 col-form-label">Order ID</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">23123</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label"><span class="badge badge-warning">belum dibayar</span></label>
                        </div>
                        <div class="form-group trans row">
                            <label for="penerima" class="col-sm-3 col-form-label">Penerima</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">John Doe</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">john_doe@mail.com</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="telpon" class="col-sm-3 col-form-label">Telpon</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">08999999999</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">DI Yogyakarta</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">kotamu</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">alamatmu</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="kodepos" class="col-sm-3 col-form-label">Kode Pos</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">65493</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="kurir" class="col-sm-3 col-form-label">Kurir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">J&T</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="ongkir" class="col-sm-3 col-form-label">Ongkir</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">Rp. 20000</label>
                        </div>
                        <div class="form-group trans row">
                            <label for="total_harga" class="col-sm-3 col-form-label">Total harga</label>
                            <label class="col-sm-1 col-form-label">:</label>
                            <label class="col-sm-8 col-form-label">Rp. 40000</label>
                        </div>


                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">No Resi</h3>
                    </div>

                    
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="no_resi">
                                No Resi
                            </label>
                            <input type="text" class="form-control m-input" id="no_resi" name="no_resi" placeholder="Enter No Resi" value="">
                        </div>
                    </div>
                   
                    
                </div>


            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Order Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="product row form-group">

                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid2">
                                    <div class="product-image2">
                                        <a href="#">
                                            <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo3/images/img-1.jpeg">
                                        </a>
                                        <a class="add-to-cart" href="#">Lihat Barang</a>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                                        <p>Total: 20</p>
                                        <span class="price">Total harga: $699.99</span>
                                        <p>Status: Process</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid2">
                                    <div class="product-image2">
                                        <a href="#">
                                            <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo3/images/img-3.jpeg">
                                        </a>
                                        <a class="add-to-cart" href="#">Lihat Barang</a>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                                        <p>Total: 20</p>
                                        <span class="price">Total harga: $699.99</span>
                                        <p>Status: Process</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid2">
                                    <div class="product-image2">
                                        <a href="#">
                                            <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo3/images/img-5.jpeg">
                                        </a>
                                        <a class="add-to-cart" href="#">Lihat Barang</a>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                                        <p>Total: 20</p>
                                        <span class="price">Total harga: $699.99</span>
                                        <p>Status: Process</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid2">
                                    <div class="product-image2">
                                        <a href="#">
                                            <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo3/images/img-7.jpeg">
                                        </a>
                                        <a class="add-to-cart" href="#">Lihat Barang</a>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">Women's Designer Top</a></h3>
                                        <p>Total: 20</p>
                                        <span class="price">Total harga: $699.99</span>
                                        <p>Status: Process</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->

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