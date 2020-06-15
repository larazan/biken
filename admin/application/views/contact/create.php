<?php
$backlink = base_url() . "contact/manage";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Contact <small>/ <?= $headline ?></small></h3>

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
                        <h3 class="card-title">Contact Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php 
                    $attribute = array('class' => '');
                    echo form_open('contact/create/'.$update_id, $attribute);
                    ?>
                        
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Name" id="contact_name" name="contact_name" value="<?= $contact_name ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('contact_name'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" placeholder="Email" id="contact_email" name="contact_email" value="<?= $contact_email ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('contact_email'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" placeholder="Phone" id="contact_phone" name="contact_phone" value="<?= $contact_phone ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('contact_phone'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Message</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control textarea" rows="3" placeholder="Message" name="contact_msg"><?=$contact_msg?></textarea>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('contact_msg'); ?></div>
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
                                    echo form_dropdown('contact_status', $options, $contact_status, $additional_dd_code);
                                    ?>
                            
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('contact_status'); ?></div>
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