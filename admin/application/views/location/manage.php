

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Lokasi Pengiriman</h3>

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
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Lokasi Detail</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $form_location = base_url() . "location/submit/";
                    ?>
                    <form class="form-horizontal" method="post" action="<?= $form_location ?>">

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="provinsi" id="sel1">
                                    <option value=""> Pilih Provinsi</option>
                                        <!-- <?php
                                            if ($provinsi != '') { 
                                        ?>
                                            <option value="<?=$provinsi?>"> <?=$provinsi?></option>
                                        <?php
                                            } else {   
                                        ?>
                                            <option value=""> Pilih Provinsi</option>
                                        <?php } ?> -->
                                    </select>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('provinsi'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="kabupaten" id="sel2" disabled>
                                        <option value=""> Pilih Kota</option>
                                    
                                    </select>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('provinsi'); ?></div>
                                </div>
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

<script type="text/javascript">
  
function getLokasi() {
  var $op = $("#sel1");
  var $ok = $('#sel2');
  var prov_id = '<?=$provinsi?>';
  var kab_id = '<?=$kabupaten?>';
  $.getJSON("provinsi", function(data){        
    $.each(data, function(i,field){ 
       $op.append(`<option value="${field.province_id}" ${field.province_id === prov_id ? 'selected' : ''}>${field.province}</option>`); 
    });
  });

  if (kab_id !== '') {
    $.getJSON("kota/"+prov_id, function(data){      
        $.each(data, function(i,field){  
            $ok.append(`<option value="${field.city_id}" ${field.city_id === kab_id ? 'selected' : ''}>${field.type} ${field.city_name}</option>`); 
        });
    });
  }
}

getLokasi();

$("#sel1").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#sel2 option:gt(0)').remove();

  if(option==='')
  {
    alert('null');    
    $("#sel2").prop("disabled", true);
  }
  else
  {        
    $("#sel2").prop("disabled", false);
    getKota(option);
  }
});

function getKota(idpro) {
  var $op = $("#sel2"); 
  var kab_id = '<?=$kabupaten?>';
  $.getJSON("kota/"+idpro, function(data){      
    $.each(data, function(i,field){  
    //    $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 
       $op.append(`<option value="${field.city_id}" ${field.city_id === kab_id ? 'selected' : ''}>${field.type} ${field.city_name}</option>`); 
    });
  });
}


</script>