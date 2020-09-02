

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Midtrans <small>/ </small></h3>

            </div><!-- /.col -->

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

                <!-- Horizontal Form -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Site Configuration</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $attribute = array('class' => '');
                    echo form_open('midtrans/do_update/', $attribute);
                    ?>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="midtrans_key">
                                Midtrans API key
                            </label>
                            <input type="text" class="form-control m-input" id="midtrans_key" name="midtrans_key" placeholder="Enter API key" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'midtrans_key'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('midtrans_key'); ?></div>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-info btn-block" value="Submit">Submit</button>
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
