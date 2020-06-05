<?php
$backlink = base_url() . "customer/manage";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Customer <small>/ <?= $headline ?></small></h3>

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


                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Customer Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $form_location = base_url() . "customer/create/" . $update_id;
                    ?>
                    <form class="form-horizontal" method="post" action="<?= $form_location ?>">
                        <!-- alert -->
                        <?php
                        if (isset($flash)) {
                            echo $flash;
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Customer Name" id="customer_name" name="customer_name" value="<?= $customer_name ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('customer_name'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" placeholder="Customer Email" id="customer_email" name="customer_email" value="<?= $customer_email ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('customer_email'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Address</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Customer Address" id="customer_address" name="customer_address" value="<?= $customer_address ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('customer_address'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Customer Phone" id="customer_phone" name="customer_phone" value="<?= $customer_phone ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('customer_phone'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Customer City</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Customer City" id="customer_city" name="customer_city" value="<?= $customer_city ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('customer_city'); ?></div>
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
                                    echo form_dropdown('customer_status', $options, $customer_status, $additional_dd_code);
                                    ?>
                            
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('customer_status'); ?></div>
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