<?php
$backlink = base_url() . "payment/manage";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Payment <small>/ <?= $headline ?></small></h3>

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
                        <h3 class="card-title">Payment Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $attribute = array('class' => '');
                    echo form_open_multipart('payment/create/' . $update_id, $attribute);
                    ?>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="<?= $name ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('name'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?= $email ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Rekening</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Rekening" id="rekening" name="rekening" value="<?= $rekening ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('rekening'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Bank</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Author" id="author" name="author" value="<?= $author ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('author'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Total" id="total" name="total" value="<?= $total ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('total'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date payment</label>
                            <div class="col-sm-6">
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-6">
                                <textarea class="form-control textarea" rows="3" placeholder="Description" name="description"><?= $description ?></textarea>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('description'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="featured_image">

                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('featured_image'); ?></div>
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

                <!-- image -->
                <?php
                $path_img = base_url() . 'assets/payment/' . $featured_image;
                if ($featured_image != "") { ?>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Image</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="">
                                <img src="<?= $path_img ?>" width="" style="width: 100%;">
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>