<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<style>
    /*------------------------
Radio & Checkbox CSS
-------------------------*/
    .form-control {
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
        width: 100%;
        height: 70px;
        padding: 14px 18px;
        line-height: 1.42857143;
        border: 1px solid #dfe2e7;
        background-color: #dfe2e7;
        text-transform: capitalize;
        letter-spacing: 0px;
        margin-bottom: 16px;
        -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
        box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
        -webkit-appearance: none;
    }

    input[type=radio].with-font,
    input[type=checkbox].with-font {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    input[type=radio].with-font~label:before,
    input[type=checkbox].with-font~label:before {
        font-family: FontAwesome;
        display: inline-block;
        content: "\f1db";
        letter-spacing: 10px;
        font-size: 1.2em;
        color: #dfe2e7;
        width: 1.4em;
    }

    input[type=radio].with-font:checked~label:before,
    input[type=checkbox].with-font:checked~label:before {
        content: "\f00c";
        font-size: 1.2em;
        color: #0943c6;
        letter-spacing: 5px;
    }

    input[type=checkbox].with-font~label:before {
        content: "\f096";
    }

    input[type=checkbox].with-font:checked~label:before {
        content: "\f046";
        color: #0943c6;
    }

    input[type=radio].with-font:focus~label:before,
    input[type=checkbox].with-font:focus~label:before,
    input[type=radio].with-font:focus~label,
    input[type=checkbox].with-font:focus~label {}

    .box {
        background-color: #fff;
        border-radius: 8px;
        border: 2px solid #e9ebef;
        padding: 50px;
        margin-bottom: 40px;
    }

    .box-title {
        margin-bottom: 30px;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 700;
        color: #094bde;
        letter-spacing: 2px;
    }

    .plan-selection {
        border-bottom: 2px solid #e9ebef;
        padding-bottom: 25px;
        margin-bottom: 35px;
    }

    .plan-selection:last-child {
        border-bottom: 0px;
        margin-bottom: 0px;
        padding-bottom: 0px;
    }

    .plan-data {
        position: relative;
    }

    .plan-data label {
        font-size: 20px;
        margin-bottom: 15px;
        font-weight: 400;
    }

    .plan-text {
        padding-left: 35px;
    }

    .plan-price {
        position: absolute;
        right: 0px;
        color: #094bde;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: -1px;
        line-height: 1.5;
        bottom: 43px;
    }

    .term-price {
        bottom: 18px;
    }

    .secure-price {
        bottom: 68px;
    }

    .summary-block {
        border-bottom: 2px solid #d7d9de;
    }

    .summary-block:last-child {
        border-bottom: 0px;
    }

    .summary-content {
        padding: 28px 0px;
    }

    .summary-price {
        color: #094bde;
        font-size: 20px;
        font-weight: 400;
        letter-spacing: -1px;
        margin-bottom: 0px;
        display: inline-block;
        float: right;
    }

    .summary-small-text {
        font-weight: 700;
        font-size: 12px;
        color: #8f929a;
    }

    .summary-text {
        margin-bottom: -10px;
    }

    .summary-title {
        font-weight: 700;
        font-size: 14px;
        color: #1c1e22;
    }

    .summary-head {
        display: inline-block;
        width: 120px;
    }

    .widget {
        margin-bottom: 30px;
        background-color: #e9ebef;
        padding: 50px;
        border-radius: 6px;
    }

    .widget:last-child {
        border-bottom: 0px;
    }

    .widget-title {
        color: #094bde;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 25px;
        letter-spacing: 1px;
        display: table;
        line-height: 1;
    }

    .btn {
        font-family: 'Noto Sans', sans-serif;
        font-size: 16px;
        text-transform: capitalize;
        font-weight: 700;
        padding: 12px 36px;
        border-radius: 4px;
        line-height: 2;
        letter-spacing: 0px;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        word-wrap: break-word;
        white-space: normal !important;
    }

    .btn-default {
        background-color: #0943c6;
        color: #fff;
        border: 1px solid #0943c6;
    }

    .btn-default:hover {
        background-color: #063bb3;
        color: #fff;
        border: 1px solid #063bb3;
    }

    .btn-default.focus,
    .btn-default:focus {
        background-color: #063bb3;
        color: #fff;
        border: 1px solid #063bb3;
    }

    .flex-sm-row {
        -ms-flex-direction: row !important;
        flex-direction: row !important;
    }

    .mb-auto,
    .my-auto {
        margin-bottom: auto !important;
    }

    .mt-auto,
    .my-auto {
        margin-top: auto !important;
    }

    .media-body {
        -ms-flex: 1;
        flex: 1;
    }

    .col-auto {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .media {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: start;
        align-items: flex-start;
    }

    .boxed {
        padding: 0px 8px 0 8px;
        background-color: #4bb8a9;
        color: white;
    }

    .table-summary tr {

        padding: 10px;
    }

    .form-checkout {
        height: 34px;
        padding: 6px 12px;
        background-color: #fff;
        text-transform: capitalize;
    }

    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: .25rem;
        font-size: 80%;
        color: #dc3545;
    }

    .boxed-1 {
        padding: 0px 8px 0 8px;
        color: black !important;
        border: 1px solid #aaaa;
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
                <div class="row2">
                    <h2 class="card-title space ">Checkout</h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="box">
                        <h4 class="mb-3 widget-title">Billing address</h4>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Nama Depan</label>
                                    <input type="text" class="form-control form-checkout" id="firstName" name="" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Nama Belakang</label>
                                    <input type="text" class="form-control form-checkout" id="lastName" name="" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Nomer Telpon</label>
                                    <input type="phone" class="form-control form-checkout" id="phone" name="" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid phone is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control form-checkout" id="email" placeholder="you@example.com">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username">Provinsi</label>
                                <select class="custom-select form-control form-checkout" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="state">Kota</label>
                                    <select class="custom-select form-control form-checkout" id="state" required>
                                        <option value="">Choose...</option>
                                        <option>California</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="zip">KodePos</label>
                                    <input type="text" class="form-control form-checkout" id="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                            </div>



                            <div class="mb-3">
                                <label for="address">Alamat Lengkap</label>
                                <textarea class="form-control form-checkout" rows="5" id="address" placeholder="1234 Main St" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>

                        </form>

                    </div>

                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

                    <div class="widget2">
                        <h4 class="widget-title">Order Summary</h4>
                        <div class="card border-0 ">
                            <div class="card-header card-2">
                                <p class="card-text text-muted mt-md-4 mb-2 space">YOUR ORDER </p>
                            </div>

                            <div class="card-body">
                                <div class="row2">
                                    <table class="table table-summary">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img class=" img-fluid" src="https://i.imgur.com/6oHix28.jpg" width="62" height="62">
                                                </td>
                                                <td width="220">
                                                    <p class="mb-0"><b>EC-GO Bag Standard</b></p><small class="text-muted">1 Week Subscription</small>
                                                </td>
                                                <td>
                                                    <p class="boxed">2</p>
                                                </td>
                                                <td width="140" style="text-align: right;">
                                                    <p><b>179 SEK</b></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img class=" img-fluid" src="https://i.imgur.com/6oHix28.jpg" width="62" height="62">
                                                </td>
                                                <td width="220">
                                                    <p class="mb-0"><b>EC-GO Bag Standard</b></p><small class="text-muted">1 Week Subscription</small>
                                                </td>
                                                <td>
                                                    <p class="boxed">2</p>
                                                </td>
                                                <td width="140" style="text-align: right;">
                                                    <p><b>179 SEK</b></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img class=" img-fluid" src="https://i.imgur.com/6oHix28.jpg" width="62" height="62">
                                                </td>
                                                <td width="220">
                                                    <p class="mb-0"><b>EC-GO Bag Standard</b></p><small class="text-muted">1 Week Subscription</small>
                                                </td>
                                                <td>
                                                    <p class="boxed">2</p>
                                                </td>
                                                <td width="140" style="text-align: right;">
                                                    <p><b>179 SEK</b></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>




                            <hr class="my-2">
                            <div class="row2 ">
                                <table class="">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="mb-1"><b>Subtotal</b></p>
                                            </td>
                                            <td width="300">

                                            </td>

                                            <td width="140" style="text-align: right;">
                                                <p class="mb-1"><b>179 SEK</b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-1"><b>Shipping</b></p>
                                            </td>
                                            <td width="300">

                                            </td>

                                            <td width="140" style="text-align: right;">
                                                <p class="mb-1"><b>0 SEK</b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-1"><b>TOTAL</b></p>
                                            </td>
                                            <td width="300">

                                            </td>

                                            <td width="140" style="text-align: right;">
                                                <p class="mb-1"><b>179 SEK</b></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <hr class="my-0">
                            </div>
                        </div>
                        <div class="row mb-5 mt-4 ">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Bayar</button>
                        </div>
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
        $(document).ready(function() {
            $('.details-slick').slick();
        });
    </script>
</body>

</html>