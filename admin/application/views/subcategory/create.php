<?php
$backlink = base_url() . "SubCategory/manage";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">SubCategory <small>/ <?= $headline ?></small></h3>

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
                        <h3 class="card-title">SubCategory Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $form_location = base_url() . "SubCategory/create/" . $update_id;
                    ?>
                    <form class="form-horizontal" method="post" action="<?= $form_location ?>">

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">SubCategory Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="SubCategory Name" id="sub_name" name="sub_name" value="<?= $sub_name ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('sub_name'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-6">
                                    <?php
                                    $additional_dd_code = 'class="form-control"';
                                    $kategori_induk = array('' => 'Please Select');
                                    foreach ($categories->result_array() as $row) {
                                        $kategori_induk[$row['id']] = $row['category_name'];
                                    }
                                    echo form_dropdown('cat_id', $kategori_induk, $cat_id, $additional_dd_code);
                                    ?>

                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cat_id'); ?></div>
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
                                    echo form_dropdown('status', $options, $status, $additional_dd_code);
                                    ?>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('status'); ?></div>
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