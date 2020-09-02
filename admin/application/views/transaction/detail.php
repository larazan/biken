<?php
    $backlink = base_url() . "transaction/manage";
?>

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

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Detail Transaction<small> </small></h3>
                
            </div><!-- /.col -->
            <div class="col-sm-6">
            <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- alert -->
<?php
if (isset($flash)) {
    echo $flash;
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Order Details</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Order ID</td>
                                    <td><?= $order_id ?></td>
                                </tr>
                                <tr>
                                    <td>Payment Type</td>
                                    <td><?= $payment_type ?></td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td><?= $gross_amount ?></td>
                                </tr>
                                <tr>
                                    <td>Transaction ID</td>
                                    <td><?= $transaction_id ?></td>
                                </tr>
                                <tr>
                                    <td>Transaction Time</td>
                                    <td><?= $transaction_time ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <h5><span class="badge badge-secondary"><?= $status_message ?></span></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Information</td>
                                    <td><?= $transaction_status ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Payment Details</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Bill key</td>
                                    <td>
                                        <?php
                                        if (isset($bill_key)) {
                                            echo $bill_key;
                                        } else {
                                            echo "-";
                                        }

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Biller code</td>
                                    <td>
                                        <?php
                                        if (isset($biller_code)) {
                                            echo $biller_code;
                                        } else {
                                            echo "-";
                                        }

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bank</td>
                                    <td>
                                        <?php
                                        if (isset($va_numbers[0]->bank)) {
                                            echo $va_numbers[0]->bank;
                                        } else {
                                            echo "-";
                                        }

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VA number</td>
                                    <td>
                                        <?php
                                        if (isset($va_numbers[0]->va_number)) {
                                            echo $va_numbers[0]->va_number;
                                        } else {
                                            echo "-";
                                        }

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VA Permata</td>
                                    <td>
                                        <?php
                                        if (isset($permata_va_number)) {
                                            echo $permata_va_number;
                                        } else {
                                            echo "-";
                                        }

                                        ?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Virtul Account</td>
                                    <td>875438792333</td>
                                </tr>
                                <tr>
                                    <td>Acquiring Bank</td>
                                    <td>BNI</td>
                                </tr>
                                <tr>
                                    <td>Reference ID</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Expand Time</td>
                                    <td></td>
                                </tr> -->

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Customer Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>Tri wiyono</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>0987654321</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>Tri.wiyono@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>Jl. Raya Wisma Pagesangan No.203, Pagesangan, Kec. Jambangan, Kota SBY, Jawa Timur 60233</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>


            </div>

        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>