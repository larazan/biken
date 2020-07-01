<?php
$deskripsi = $this->db->get_where('tbl_information', array('type' => 'kebijakan_privasi'))->row()->description;
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Information Management<small> </small></h3>

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
            <div class="col-md-3">

                <!-- Horizontal Form -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Menu</h3>
                    </div>
                    <!-- /.card-header -->

                    <?php
                    $this->load->view('information/left_menu');
                    ?>

                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

            <div class="col-md-9">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Kebijakan Privasi</h3>
                    </div>

                    <?php echo form_open('information/do_update', 'class=m-form'); ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control textarea" rows="8" placeholder="Tentang kami" name="kebijakan_privasi"><?=$deskripsi?></textarea>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('kebijakan_privasi'); ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-info btn-block" value="Submit_Kebijakan">Submit</button>
                    </div>
                    <!-- /.card-footer -->
                    </form>
                </div>


            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
        height: 250, 
    })
  })
</script>