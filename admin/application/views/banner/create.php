<?php
$backlink = base_url() . "banner/manage";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Banner <small>/ <?= $headline ?></small></h3>

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
                        <h3 class="card-title">Banner Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php 
                    $attribute = array('class' => '');
                    echo form_open_multipart('banner/create/'.$update_id, $attribute);
                    ?>
                        
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Banner Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Name" id="banner_name" name="banner_name" value="<?= $banner_name ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('banner_name'); ?></div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="banner_img">
            
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('banner_img'); ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Caption</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Caption" id="banner_caption" name="banner_caption" value="<?= $banner_caption ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('banner_caption'); ?></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Link" id="banner_link" name="banner_link" value="<?= $banner_link ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('banner_link'); ?></div>
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
                                    echo form_dropdown('banner_status', $options, $banner_status, $additional_dd_code);
                                    ?>
                            
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('banner_status'); ?></div>
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
$path_img = base_url().'assets/banner/'.$banner_img;
if ($banner_img != "") { ?>

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