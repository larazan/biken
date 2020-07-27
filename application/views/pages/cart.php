<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>

<style type="text/css">
	.listing-style3 .box {
		box-shadow: 0 5px 20px 0 rgba(80,106,172,0.3);
	}
	.no_item {
		text-align: center;

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

    <!-- <?php
    echo "<pre>";
    foreach ($query->result() as $row) {
        var_dump($row);
    }
    echo "</pre>";
    ?> -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">


                    <?php
                    if ($num_rows < 1) { ?>
                        <div class="no_item">
                            <h3>Keranjang pemesanan masih kosong.</h3>
                            <div class="">
                                <a href="<?= base_url() ?>" class="button btn-medium red">Cari barang sekarang</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="no_item">
                            <h3><?= $showing_statement ?></h3>
                        </div>
                   

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $grand_total = 0;
                            foreach ($query->result() as $row) {
                                $basket_id = $row->basket_tag;
                                $prod_id = $row->item_id;
                                $prod_colour = $row->item_colour;
                                $prod_size = $row->item_size;
                                $prod_title = $row->item_title;
                                $prod_price = $row->price;
                                $prod_qty = $row->item_qty;
                                $sub_total = $prod_price * $prod_qty;
                                $shopper_id = $row->shopper_id;

                                // product
                                $details = $this->db->get_where('tbl_product', array('product_id' => $prod_id))->row();
                                $brand_id = $details->product_brand;
                                $stok = $details->product_quantity;
                                $slug = $details->product_url;
                                $img = $details->product_image;

                                // brand
                                $brands = $this->db->get_where('tbl_brand', array('brand_id' => $brand_id))->row();
                                $brand_url = $brands->brand_url;
                                $brand_name = $brands->brand_name;

                                $stock = ($stok > 0) ? 'In Stock' : 'Out of Stock';

                                $sub_total = $prod_price;
                                $grand_total = $grand_total + $sub_total;
                                $tax = ($grand_total * 10) / 100;
                            ?>

                                <tr>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;" alt="<?= $img ?>"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="<?= $slug ?>"><?= $prod_title ?></a></h4>
                                                <h5 class="media-heading"> by <a href="<?= $brand_url ?>"><?= $brand_name ?></a></h5>
                                                <span>Status: </span><span class="text-success"><strong><?= $stock ?></strong></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="number" class="form-control" id="exampleInputEmail1" value="<?= $row->item_qty ?>">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>Rp. <?= $prod_price ?></strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?= $sub_total ?></strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <!-- <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button> -->
                                        <a href="<?= base_url() ?>basket/remove/<?= $basket_id ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>

                            <?php } ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <h5>Subtotal</h5>
                                    <h3>Total</h3>
                                </td>
                                <td class="text-right">
                                    <h5><strong><?= $grand_total ?></strong></h5>
                                    <h3><?= $grand_total ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td> <span class="nfo" style="font-size: 12px; color: red; ">* harga belum termasuk ongkos kirim</span> </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <a href="<?= base_url() ?>" class="btn btn-default"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
                                </td>
                                <td>
                                    <?php
                                    if ($this->session->userdata('userId') != '') { 
                                    ?>
                                        <a href="<?php echo base_url() . 'cart/go_to_checkout/' . $checkout_token; ?>" class="btn btn-success"> Checkout </a>
                                       
                                    <?php } else { ?>
                                        <a href="<?php echo base_url() . 'cart/go_to_option'; ?>" class="btn btn-danger"> Checkout </a> 
                                    <?php } ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>


                    <?php } ?>

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