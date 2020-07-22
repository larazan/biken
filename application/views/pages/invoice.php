<?php
$shop_name = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
$shop_address = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
$shop_phone = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
$shop_email = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;
$arr_courier = explode(", ",$courrier);
$shipping = $arr_courier[2];
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<style>
    .invoice-title h2,
    .invoice-title h3 {
        display: inline-block;
    }

    .table>tbody>tr>.no-line {
        border-top: none;
    }

    .table>thead>tr>.no-line {
        border-bottom: none;
    }

    .table>tbody>tr>.thick-line {
        border-top: 2px solid;
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

                <div class="col-xs-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <h3 class="pull-right">Order # 12345</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                <?= $shop_name ?><br>
                                <?= $shop_address ?><br>
                                <?= $shop_phone ?>
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Shipped To:</strong><br>
                                <?= $firstname ?> <?= $lastname ?><br>
                                <?= $address ?><br>
                                <?= $zipcode ?>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Visa ending **** 4242<br>
                                jsmith@email.com
                            </address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Tanggal Order:</strong><br>
                                date("d-m-Y")<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td><strong>Item</strong></td>
                                            <td class="text-center"><strong>Price</strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <?php
                                            $grand_total = 0;
                                            $shipping = 0;
                                            foreach ($query->result() as $row) {
                                                $basket_id = $row->id;
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
                                                <td><?= $prod_title ?></td>
                                                <td class="text-center">Rp. <?= $prod_price ?></td>
                                                <td class="text-center"><?= $row->item_qty ?></td>
                                                <td class="text-right">Rp. <?= $sub_total ?></td>
                                            </tr>

                                        <?php } ?>

                                        <!-- <tr>
                                            <td>BS-400</td>
                                            <td class="text-center">$20.00</td>
                                            <td class="text-center">3</td>
                                            <td class="text-right">$60.00</td>
                                        </tr>
                                        <tr>
                                            <td>BS-1000</td>
                                            <td class="text-center">$600.00</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">$600.00</td>
                                        </tr>
                                        -->
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right">Rp. <?= $grand_total ?></td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Shipping</strong></td>
                                            <td class="no-line text-right">Rp. <?=$shipping?></td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Total</strong></td>
                                            <td class="no-line text-right">Rp. <?= ($grand_total + $shipping) ?></td>
                                        </tr> 
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

    <!-- jQuery Plugins -->
    <?php include 'application/views/layouts/jspack.php' ?>
    <script>
        $(document).ready(function() {
            $('.details-slick').slick();
        });
    </script>
</body>

</html>