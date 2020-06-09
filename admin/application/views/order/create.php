<?php
$backlink = base_url() . "order/manage";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Order <small>/ <?= $headline ?></small></h3>

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                <!-- alert -->
                <?php
                        if (isset($flash)) {
                            echo $flash;
                        }
                        ?>

                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Order Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $form_location = base_url() . "order/create/" . $update_id;
                    ?>
                    <form class="form-horizontal" method="post" action="<?= $form_location ?>">
                        
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Order ID</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Order ID" id="order_id" name="order_id" value="<?= $order_id ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('order_id'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Customer ID</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Customer ID" id="cus_id" name="cus_id" value="<?= $cus_id ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cus_id'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Payment ID</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Payment ID" id="payment_id" name="payment_id" value="<?= $payment_id ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('payment_id'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Total" id="order_total" name="order_total" value="<?= $order_total ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('order_total'); ?></div>
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-6">
                                    <?php 
                                    $additional_dd_code = 'class="form-control"';
                                    $options = array(
                                                    '' => 'Please Select',
                                                    '1' => 'Active',
                                                    '0' => 'Inactive'  
                                                );
                                    echo form_dropdown('order_status', $options, $order_status, $additional_dd_code);
                                    ?>
                            
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('order_status'); ?></div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-default" value="Cancel">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-info float-right" value="Submit">Submit</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>