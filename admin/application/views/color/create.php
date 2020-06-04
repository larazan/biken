<?php
$backlink = base_url() . "user/manage";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">User <small>/ <?= $headline ?></small></h3>

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
                        <h3 class="card-title">Enter User Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $form_location = base_url() . "user/create/" . $update_id;
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
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Full Name" id="username" name="username" value="<?= $name ?>" required>
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
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('password'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" placeholder="Confirm Password" id="cpassword" name="cpassword">
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('cpassword'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Mobile Phone" id="mobile" name="mobile" value="<?= $mobile ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('mobile'); ?></div>
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