<?php
$backlink = base_url() . "product/manage";
?>

<style type="text/css">
    .checkbox-inline {
        -webkit-columns: 6;
        -moz-columns: 6;
        columns: 6;
        /*border: solid 5px #F00;*/
        padding: 10px 15px;
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
                <h3 class="m-0 text-dark">Product <small>/ <?= $headline ?></small></h3>

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
                        <h3 class="card-title">Product Details</h3>
                        <a href="<?= $backlink ?>" class="btn bg-warning float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $attribute = array('class' => '');
                    echo form_open_multipart('product/create/' . $update_id, $attribute);
                    ?>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Product Name" id="product_title" name="product_title" value="<?= $product_title ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_title'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-6">
                                <?php
                                $additional_dd_code = 'class="form-control"';
                                $kategori_produk = array('' => 'Please Select');
                                foreach ($categories->result_array() as $row) {
                                    $kategori_produk[$row['id']] = $row['category_name'];
                                }
                                echo form_dropdown('product_category', $kategori_produk, $product_category, $additional_dd_code);
                                ?>

                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_category'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-6">
                                <?php
                                $additional_dd_code = 'class="form-control"';
                                $kategori_brand = array('' => 'Please Select');
                                foreach ($brands->result_array() as $row) {
                                    $kategori_brand[$row['brand_id']] = $row['brand_name'];
                                }
                                echo form_dropdown('product_brand', $kategori_brand, $product_brand, $additional_dd_code);
                                ?>

                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_brand'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="product_image">

                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_image'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">SKU</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder=" SKU" id="sku" name="sku" value="<?= $sku ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('sku'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder=" Price" id="product_price" name="product_price" value="<?= $product_price ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_price'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Weight</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder=" Weight" id="product_weight" name="product_weight" value="<?= $product_weight ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_weight'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Quantity</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder=" Quantity" id="product_quantity" name="product_quantity" value="<?= $product_quantity ?>" required>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_quantity'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Size (optional)</label>
                            <div class="col-sm-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Size</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="display: block;">
                                    <label for="" style="margin-top: 10px;">
                                            <input type="checkbox" id="pilih_semua" /> Select All<br />
                                        </label>
                                        <div class="m-checkbox-list2">
                                            <div class="checkbox-inline">
                                                <?php
                                                foreach ($sizes->result() as $row) {
                                                ?>
                                                    <?php
                                                    if ($sizeList != '') {
                                                        $checked = in_array($row->size_id, $sizeList) ? " checked " : null;
                                                    } else {
                                                        $checked = null;
                                                    }

                                                    ?>
                                                    <label class="m-checkbox2">
                                                        <input type="checkbox" class="size" id="size" value="<?= $row->size_id ?>" name="size[]" <?=$checked?> > <?=$row->name?>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_quantity'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Color (optional)</label>
                            <div class="col-sm-6">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Color</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="display: block;">
                                        <label for="" style="margin-top: 10px;">
                                            <input type="checkbox" id="select_all" /> Select All<br />
                                        </label>
                                        <div class="m-checkbox-list2">
                                            <div class="checkbox-inline">
                                                <?php
                                                foreach ($colors->result() as $row) {
                                                ?>
                                                    <?php
                                                    if ($colorList != '') {
                                                        $checked = in_array($row->color_id, $colorList) ? " checked " : null;
                                                    } else {
                                                        $checked = null;
                                                    }

                                                    ?>
                                                    <label class="m-checkbox2">
                                                        <input type="checkbox" class="color" id="color" value="<?= $row->color_id ?>" name="color[]" <?=$checked?> > <?=$row->name?>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_quantity'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Description</label>
                            <div class="col-sm-6">
                                <textarea class="textarea" placeholder="Product Description" name="product_description"><?= $product_description ?></textarea>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_description'); ?></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Product Specification</label>
                            <div class="col-sm-6 row" id="content-spec">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Type" id="type" name="type[]" value="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Value" id="val" name="val[]" value="">
                                    </div>
                                    <!-- <div class="col-sm-2"></div> -->
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <button type="button" id="add" class="btn btn-primary float-right">Add input</button>
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
                                echo form_dropdown('product_status', $options, $product_status, $additional_dd_code);
                                ?>

                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_status'); ?></div>
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
                $path_img = base_url() . 'assets/product/' . $product_image;
                if ($product_image != "") { ?>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Product Image</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="">
                                <a href="<?= $path_img ?>" data-toggle="lightbox" data-title="">
                                    <img src="<?= $path_img ?>" width="" style="width: 100%;">
                                </a>
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

<script>
    $(document).ready(function() {
        var i = 1;

        $('#add').click(function() {
            var el = `<div class="row"  id="row${i}" style="margin-top:10px;">
                    <div class='col-sm-5'>
                        <input type='text' class='form-control' placeholder='Type' id='type' name='type[]' value=''>
                    </div>
                    <div class='col-sm-5'>
                        <input type='text' class='form-control' placeholder='Value' id='val' name='val[]' value=''>
                    </div>
                    <div class='col-sm-2'>
                        <button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">X</button>
                    </div>
                </div>`;
            i++;
            $('#content-spec').append(el);
        });
        $(document).on('click', '.btn_remove', function() {
            console.log('delete');

            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>

<script>
var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("color"); //checkbox items
var pilihSemua = document.getElementById("pilih_semua"); //select all checkbox
var checkboxesPermiss = document.getElementsByClassName("size"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
	for (i = 0; i < checkboxes.length; i++) { 
		checkboxes[i].checked = select_all.checked;
	}
});

pilihSemua.addEventListener("change", function(e){
	for (i = 0; i < checkboxesPermiss.length; i++) { 
		checkboxesPermiss[i].checked = pilihSemua.checked;
	}
});

for (var i = 0; i < checkboxesPermiss.length; i++) {
	checkboxesPermiss[i].addEventListener('change', function(e){ //".checkbox" change 
		//uncheck "select all", if one of the listed checkbox item is unchecked
		if(this.checked == false){
			pilihSemua.checked = false;
		}
		//check "select all" if all checkbox items are checked
		if(document.querySelectorAll('.checkbox:checked').length == checkboxesPermiss.length){
			pilihSemua.checked = true;
		}
	});
}

for (var i = 0; i < checkboxes.length; i++) {
	checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
		//uncheck "select all", if one of the listed checkbox item is unchecked
		if(this.checked == false){
			select_all.checked = false;
		}
		//check "select all" if all checkbox items are checked
		if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
			select_all.checked = true;
		}
	});
}
</script>