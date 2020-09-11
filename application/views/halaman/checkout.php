<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layout/head.php' ?>
<body>
<!--Start class site-->
<div class="tz-site">

    <!--Start id tz header-->
    <?php include 'application/views/layout/header.php' ?>
    <!--End id tz header-->

    <section class="shop-cart">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="#">Home</a>
                </li>
                <li class="current">
                    Checkout
                </li>
            </ul>
            <!--End Breadcrumbs-->

            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-title">Checkout</h1>

                    <!--Shop info-->
                    <div class="shop-info">
                        <p>Returning customer? <a href="#">Click here to login</a></p>
                        <p>Have a coupon?  <a href="#">Click here to enter your code</a></p>
                    </div>
                    <!--End shop info-->

                    <!--Start form checkout-->
                    <form>
                        <div class="shop-billing-fields">
                            <h3>Billing Details</h3>
                            <p class="form-row">
                                <label>Country <span class="required">*</span></label>
                                <select>
                                    <option>United States (US)</option>
                                </select>
                            </p>
                            <p class="form-row form-row-first">
                                <label for="billing_first_name" class="">First Name <span class="required">*</span></label>
                                <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="billing_last_name" class="">Last Name <span class="required">*</span></label>
                                <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="input-text " name="company_name" id="company_name" placeholder="" value="">
                            </p>
                            <p class="form-row">
                                <label for="address">Address  <span class="required">*</span></label>
                                <input type="text" class="input-text " name="address" id="address" placeholder="" value="">
                            </p>
                            <p class="form-row">
                                <label for="city">Town / City<span class="required">*</span></label>
                                <input type="text" class="input-text " name="city" id="city" placeholder="" value="">
                            </p>
                            <p class="form-row form-row-first">
                                <label for="state">State <span class="required">*</span></label>
                                <input type="text" class="input-text " name="state" id="state" placeholder="" value="">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="zip">Zip  <span class="required">*</span></label>
                                <input type="text" class="input-text " name="zip" id="zip" placeholder="" value="">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row form-row-first">
                                <label for="email">Email Address<span class="required">*</span></label>
                                <input type="email" class="input-text " name="email" id="email" placeholder="" value="">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="phone">Phone  <span class="required">*</span></label>
                                <input type="text" class="input-text " name="phone" id="phone" placeholder="" value="">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row create-account">
                                <input class="createaccount" id="createaccount" type="checkbox" name="createaccount" value="1"> <label for="createaccount" class="checkbox">Create an account?</label>
                            </p>
                            <p class="form-row ship-to-different-address-checkbox">
                                <input class="input-checkbox" id="ship-to-different-address-checkbox" type="checkbox" name="ship-to-different-address-checkbox" value="1">
                                <label for="ship-to-different-address-checkbox" class="ship-to-different-address-checkbox">Ship to a different address?</label>
                            </p>
                            <p class="form-row notes">
                                <label for="order_comments" class="">Order Notes</label>
                                <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                            </p>
                        </div>
                    </form>
                    <!--End form checkout-->

                </div>
                <div class="col-md-6">

                    <!--Order review-->
                    <div id="order_review">
                        <h3>Your Order</h3>

                        <!--Shop table-->
                        <table class="shop_table">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Liv Race Day Short
                                        <strong class="product-quantity">× 1</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">$30.00</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        City Pedals Sport
                                        <strong class="product-quantity">× 1</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">$18.00</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">
                                        Gloss
                                        <strong class="product-quantity">× 1</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">$325.00</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <th>Cart Subtotal</th>
                                <td><span class="amount">$490.00</span></td>
                            </tr>

                            <tr class="shipping">
                                <th>Shipping and Handling</th>
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
                                <th>Order Total</th>
                                <td><strong><span class="amount">$520.00</span></strong> </td>
                            </tr>
                            </tfoot>
                        </table>
                        <!--End shop table-->

                        <!--Start payment-->
                        <div id="payment" class="checkout-payment">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">

                                    <label for="payment_method_bacs">
                                        Direct Bank Transfer
                                    </label>
                                    <div class="payment_box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                    </div>
                                </li>
                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque">
                                    <label for="payment_method_cheque">
                                        Cheque Payment
                                    </label>
                                </li>
                                <li class="payment_method_paypal">
                                    <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal">
                                    <label for="payment_method_paypal">
                                        PayPal
                                    </label>
                                </li>
                            </ul>

                            <div class="clear"></div>
                        </div>
                        <!--End payment-->

                    </div>
                    <!--End order review-->

                </div>
            </div>

        </div>
    </section>

    <!--Start Footer-->
    <?php include 'application/views/layout/footer.php' ?>
    <!--End Footer-->

</div><!--End class site-->

<?php include 'application/views/layout/jspack.php' ?>

</body>
</html>