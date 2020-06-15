<?php
$addlink = base_url() . "banner/create";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Banner <small>/ Manage</small></h3>

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- alert -->
                <?php
                if (isset($flash)) {
                    echo $flash;
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                        <a href="<?= $addlink ?>" class="btn bg-primary float-right">Tambah Banner</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $path = base_url().'assets/banner/';
                                foreach ($query->result() as $row) {
                                    $editLink = base_url() . "banner/create/" . $row->banner_id;
                                    $deleteLink = base_url(). "modal/popup/delete/" . $row->banner_id . "/banner";
                                    $status = $row->banner_status;

                                    if ($status == 1) {
                                        $status_label = "m-badge--success";
                                        $status_desc = "Active";
                                    } else {
                                        $status_label = "m-badge--danger";
                                        $status_desc = "Inactive";
                                    }

                                    $tgl = getNiceDate($row->created_at, 'indon');
                                    $gambar = $path.$row->banner_img;
                                ?>

                                    <tr>
                                        <td><?= $no++ ?> </td>
                                        <td>
                                            <?= $row->banner_name ?>
                                        </td>
                                        <td>
                                            <?php echo ($row->banner_img == '') ? '' : '<img src="'.$gambar.'" class="img-responsive" width="80px">' ?>
                                        </td>
                                        <td>
                                            <span style="width: 110px;"><span class="m-badge <?= $status_label ?> m-badge--wide"><?= $status_desc ?></span></span>
                                        </td>
                                        <td><?= $tgl ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="<?= $editLink ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="1" onclick="showAjaxModal('<?= $deleteLink ?>');"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<script type="text/javascript">
    function showAjaxModal(url) {
        // SHOWING AJAX loader-1 IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>marketplace/images/loading.gif" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {
            backdrop: 'true'
        });

        //alert(url);
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response) {
                jQuery('#modal_ajax .modal-content').html(response);

            }
        });
    }
</script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>