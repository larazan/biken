<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layout/head.php' ?>
<body>
<!--Start class site-->
<div class="tz-site">

    <!--Start id tz header-->
    <?php include 'application/views/layout/header.php' ?>
    <!--End id tz header-->

    <section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="#">Home</a>
                </li>
                <li class="current">
                    Shop Cart
                </li>
            </ul>
            <!--End Breadcrumbs-->
            <h1 class="page-title">Shop Cart</h1>

            <!--Start form table-->
            <form>
                <table class="shop_table cart">
                    <!--Table header-->
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">Product</th>
                            <th class="product-name">&nbsp;</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <!--End table header-->

                    <!--Table body-->
                    <tbody>

                        <tr class="cart_item">
                            <td class="product-remove">
                                <a href="#" class="remove" title="Remove this item"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="single-product.html"><img src="images/product/widget1.jpg" alt="cart" /></a>
                            </td>

                            <td class="product-name">
                                <a href="single-product.html">Liv Race Day Short </a>
                                <span class="color">
                                    Color: <i class="orange"></i>
                                </span>
                            </td>
                            <td class="product-price">
                                <span class="amount">$20.00</span>
                            </td>

                            <td class="product-quantity">
                                <div class="quantity"><input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4"></div>
                            </td>

                            <td class="product-subtotal">
                                <span class="amount">$229.00</span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td class="product-remove">
                                <a href="#" class="remove fa-" title="Remove this item"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="single-product.html"><img src="images/product/widget2.jpg" alt="cart" /></a>
                            </td>

                            <td class="product-name">
                                <a href="single-product.html">City Pedals Sport </a>
                                <span class="color">
                                    Color: <i class="light-blue"></i>
                                </span>
                            </td>
                            <td class="product-price">
                                <span class="amount">$20.00</span>
                            </td>

                            <td class="product-quantity">
                                <div class="quantity"><input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4"></div>
                            </td>

                            <td class="product-subtotal">
                                <span class="amount">$229.00</span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td class="product-remove">
                                <a href="#" class="remove fa-" title="Remove this item"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="single-product.html"><img src="images/product/widget3.jpg" alt="cart" /></a>
                            </td>

                            <td class="product-name">
                                <a href="single-product.html">Gloss </a>
                                <span class="color">
                                    Color: <i class="red-light"></i>
                                </span>
                            </td>
                            <td class="product-price">
                                <span class="amount">$20.00</span>
                            </td>

                            <td class="product-quantity">
                                <div class="quantity"><input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4"></div>
                            </td>

                            <td class="product-subtotal">
                                <span class="amount">$229.00</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="actions" colspan="6">
                                <a class="back-shop" href="#"><i class="fa fa-angle-left"></i> BACK TO SHOP</a>
                                <button class="update-cart" type="submit">update cart</button>
                            </td>
                        </tr>

                    </tbody>
                    <!--End table body-->
                </table>
            </form>
            <!--End form table-->

            <!--Cart attr-->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                   
                </div>
                <div class="col-md-6 col-sm-6">

                    <!--Cart totals-->
                    <div class="cart_totals">
                        <div class="cart_totals_inner">
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">$293.00</span></td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Shipping and handling</th>
                                        <td>
                                            <form class="shop-shipping-calculator"  method="post">
                                               <p class="form-r">
                                                   <input type="checkbox" name="rate" value="1" />
                                                   <span>
                                                       Flat Rate:
                                                       <span class="price">
                                                           $30.00
                                                       </span>
                                                   </span>
                                               </p>
                                                <p class="form-r">
                                                    <input type="checkbox" name="international" value="1" />
                                                   <span>
                                                       International Delivery:
                                                       <span class="price">
                                                           $150.00
                                                       </span>
                                                   </span>
                                                </p>
                                                <p class="form-r">
                                                    <input type="checkbox" name="rate" value="1" />
                                                   <span>
                                                       Local Delivery:
                                                       <span class="price">
                                                           $90.00
                                                       </span>
                                                   </span>
                                                </p>
                                                <p class="form-r">
                                                    <input type="checkbox" name="pickup" value="1" />
                                                   <span>Local Pickup (Free)</span>
                                                </p>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order total</th>
                                        <td><span class="amount">$293.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--End cart totals-->

                </div>
            </div>
            <!--End cart attr-->
        </div>
    </section>

    <!--Start Footer-->
    <?php include 'application/views/layout/footer.php' ?>
    <!--End Footer-->

</div><!--End class site-->

<?php include 'application/views/layout/jspack.php' ?>

</body>
</html>