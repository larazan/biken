<?php
$addlink = base_url() . "order/create";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Order <small>/ Manage</small></h3>

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
                        <a href="<?= $addlink ?>" class="btn bg-primary float-right">Tambah Order</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Bank</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($query->result() as $row) {
                                    $editLink = base_url() . "order/detail/" . $row->order_id;
                                    $deleteLink = base_url(). "modal/popup/delete/" . $row->order_id . "/order";
                                    $customer_name = $this->db->get_where('tbl_customer', array('customer_id' => $row->shopper_id))->row()->customer_name;
                                    $bank_name = $this->db->get_where('tbl_bank', array('id' => $row->bank_id))->row()->title;
                                    $status = $row->order_status;

// 0 => 'Unpaid / Belum dibayar'
// 1 => 'Process / Dikemas'
// 2 => 'Send / Konfirmasi Terima Barang'
// 3 => 'Arrive / Barang Sampai'
// 4 => 'Cancel / Dibatalkan'
// default => 'Error'                                    

                                    switch ($status) {
                                        case 0:
                                            $status_label = "badge-danger";
                                            $status_desc = "Unpaid";
                                            break;

                                        case 1:
                                            $status_label = "badge-warning";
                                            $status_desc = "Process";
                                            break;
                                        
                                        case 2:
                                            $status_label = "badge-info";
                                            $status_desc = "Send";
                                            break;

                                        case 3:
                                            $status_label = "badge-success";
                                            $status_desc = "Arrive";
                                            break;

                                        case 4:
                                            $status_label = "badge-danger";
                                            $status_desc = "Cancel";
                                            break;

                                        default:
                                            $status_label = "badge-danger";
                                            $status_desc = "Error";
                                            break;    
                                    }

                                    $tgl = getNiceDate($row->order_date, 'indo');
                                ?>

                                    <tr>
                                        <td><?= $no++ ?> </td>
                                        <td>
                                            <?= $row->order_id ?>
                                        </td>
                                        <td>
                                            <?= $customer_name ?>
                                        </td>
                                        <td>
                                            <?= $bank_name ?>
                                        </td>
                                        <td>
                                            <?= rupiah($row->order_total) ?>
                                        </td>
                                        <td>
                                            <span style="width: 110px;"><span class="badge <?= $status_label ?> badge--wide"><?= $status_desc ?></span></span>
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