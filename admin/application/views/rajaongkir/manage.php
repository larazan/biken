<style type="text/css">
    .checkbox-inline {
        -webkit-columns: 3;
        -moz-columns: 3;
        columns: 3;
        /*border: solid 5px #F00;*/
        /* padding: 10px 15px; */
        display: inline-block;
        position: relative;
    }

    .checkbox-inline label {
        display: block;
        white-space: nowrap;
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Raja Ongkir <small>/ </small></h3>

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
                    echo form_open('rajaOngkir/do_update/', $attribute);
                    ?>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="rajaongkir_key">
                                API key
                            </label>
                            <input type="text" class="form-control m-input" id="rajaongkir_key" name="rajaongkir_key" placeholder="Enter API key" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'rajaongkir_key'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('rajaongkir_key'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="">
                                Daftar Kurir
                            </label>
                            
                        </div>
                        <div class="form-check row">
                            <div class="checkbox-inline">
                                <label class="m-checkbox2">
                                    <input type="checkbox" class="kurir" id="kurir" value="jne" name="kurir[]"> JNE
                                </label>
                                <label class="m-checkbox2">
                                    <input type="checkbox" class="kurir" id="kurir" value="tiki" name="kurir[]"> TIKI
                                </label>
                                <label class="m-checkbox2">
                                    <input type="checkbox" class="kurir" id="kurir" value="jnt" name="kurir[]"> J&T
                                </label>
                                <label class="m-checkbox2">
                                    <input type="checkbox" class="kurir" id="kurir" value="pos" name="kurir[]"> POS Indonesia
                                </label>
                               
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

            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Cek Biaya Kirim</h3>
                    </div>

                    <form>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Berat</label>
                                <div class="input-group col-sm-8">

                                    <input type="number" value="1" min="1" class="form-control" id="berat" name="berat">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
                            <p>Lokasi Asal :</p>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="provinsi" id="sel1">
                                        <option value=""> Pilih Provinsi</option>

                                    </select>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('provinsi'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kabupaten</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="kabupaten" id="sel2" disabled>
                                        <option value=""> Pilih Kota</option>

                                    </select>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('provinsi'); ?></div>
                                </div>
                            </div>
                            <br>

                            <p>Lokasi Tujuan :</p>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="provinsi" id="sel11">
                                        <option value=""> Pilih Provinsi</option>

                                    </select>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('provinsi'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kabupaten</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="kabupaten" id="sel22" disabled>
                                        <option value=""> Pilih Kota</option>

                                    </select>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('provinsi'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kurir</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="kabupaten" id="kurir" disabled>
                                        <option value=""> Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS Indonesia</option>
                                    </select>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('provinsi'); ?></div>
                                </div>
                            </div>

                            <div id="hasil"></div>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script type="text/javascript">
    function getLokasi() {
        var $op = $("#sel1"),
            $op1 = $("#sel11");

        $.getJSON("provinsi", function(data) {
            $.each(data, function(i, field) {

                $op.append('<option value="' + field.province_id + '">' + field.province + '</option>');
                $op1.append('<option value="' + field.province_id + '">' + field.province + '</option>');

            });

        });

    }

    getLokasi();

    $("#sel11").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        $('#sel22 option:gt(0)').remove();
        $('#kurir').val('');

        if (option === '') {
            alert('null');
            $("#sel22").prop("disabled", true);
            $("#kurir").prop("disabled", true);
        } else {
            $("#sel22").prop("disabled", false);
            getKota1(option);
        }
    });


    $("#sel1").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        $('#sel2 option:gt(0)').remove();
        $('#kurir').val('');

        if (option === '') {
            alert('null');
            $("#sel2").prop("disabled", true);
            $("#kurir").prop("disabled", true);
        } else {
            $("#sel2").prop("disabled", false);
            getKota(option);
        }
    });




    $("#sel22").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        $('#kurir').val('');

        if (option === '') {
            alert('null');
            $("#kurir").prop("disabled", true);
        } else {
            $("#kurir").prop("disabled", false);
        }
    });


    $("#kurir").on("change", function(e) {
        e.preventDefault();
        var option = $('option:selected', this).val();
        var origin = $("#sel2").val();
        var des = $("#sel22").val();
        var qty = $("#berat").val();

        if (qty === '0' || qty === '') {
            alert('null');
        } else if (option === '') {
            alert('null');
        } else {
            getOrigin(origin, des, qty, option);
        }
    });


    function getOrigin(origin, des, qty, cour) {
        var $op = $("#hasil");
        var i, j, x = "";

        $.getJSON("tarif/" + origin + "/" + des + "/" + qty + "/" + cour, function(data) {
            $.each(data, function(i, field) {

                for (i in field.costs) {
                    x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : " + field.costs[i].description + "</p>";

                    for (j in field.costs[i].cost) {
                        x += field.costs[i].cost[j].value + "<br>" + field.costs[i].cost[j].etd + "<br>" + field.costs[i].cost[j].note;
                    }

                }

                $op.html(x);

            });
        });

    }


    function getKota1(idpro) {
        var $op = $("#sel22");

        $.getJSON("kota/" + idpro, function(data) {
            $.each(data, function(i, field) {


                $op.append('<option value="' + field.city_id + '">' + field.type + ' ' + field.city_name + '</option>');

            });

        });

    }



    function getKota(idpro) {
        var $op = $("#sel2");

        $.getJSON("kota/" + idpro, function(data) {
            $.each(data, function(i, field) {


                $op.append('<option value="' + field.city_id + '">' + field.type + ' ' + field.city_name + '</option>');

            });

        });

    }
</script>