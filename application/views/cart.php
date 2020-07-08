<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>


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

    <?php
    echo "<pre>";
    foreach ($query->result() as $row) {
        var_dump($row);
    }
    echo "</pre>";
    ?>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
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
                            foreach ($query->result() as $row) {
                                $prod_id = $row->item_id;
                                $prod_colour = $row->item_colour;
                                $prod_size = $row->item_size;
                                $prod_title = $row->item_title;
                                $prod_price = $row->price;
                                $prod_qty = $row->item_qty;
                                $sub_total = $prod_price*$prod_qty;
                                $shopper_id = $row->shopper_id;

                                // product
                                $details = $this->db->get_where('tbl_product' , array('product_id'=>$prod_id))->row();
                                $brand_id = $details->product_brand;
                                $stok = $details->product_quantity;
                                $slug = $details->product_url;
                                $img = $details->product_image;

                                // brand
                                $brands = $this->db->get_where('tbl_brand' , array('brand_id'=>$brand_id))->row();
                                $brand_url = $brands->brand_url;
                                $brand_name = $brands->brand_name;

                                $stock = ($stok > 0) ? 'In Stock' : 'Out of Stock';
                            ?>

                                <tr>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;" alt="<?=$img?>"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="<?=$slug?>"><?=$prod_title?></a></h4>
                                                <h5 class="media-heading"> by <a href="<?=$brand_url?>"><?=$brand_name?></a></h5>
                                                <span>Status: </span><span class="text-success"><strong><?=$stock?></strong></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="number" class="form-control" id="exampleInputEmail1" value="<?=$row->item_qty?>">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>Rp. <?=$prod_price?></strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?=$sub_total?></strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button></td>
                                </tr>

                            <?php } ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <h5>Subtotal<br>Estimated shipping</h5>
                                    <h3>Total</h3>
                                </td>
                                <td class="text-right">
                                    <h5><strong>$24.59<br>$6.94</strong></h5>
                                    <h3>$31.53</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <button type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                    </button></td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                    </button></td>
                            </tr>
                        </tfoot>
                    </table>
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