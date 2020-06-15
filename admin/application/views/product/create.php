<?php
$backlink = base_url() . "product/manage";
?>

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
                    echo form_open_multipart('product/create/'.$update_id, $attribute);
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
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Product Quantity</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder=" Quantity" id="product_quantity" name="product_quantity" value="<?= $product_quantity ?>" required>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_quantity'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Product Description</label>
                                <div class="col-sm-6">
                                    <textarea class="textarea" placeholder="Product Description" name="product_description" ><?=$product_description?></textarea>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_description'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Product Specification</label>
                                <div class="col-sm-6">

                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('product_description'); ?></div>
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
$path_img = base_url().'assets/product/'.$product_image;
if ($product_image != "") { ?>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Product Image</h3>
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