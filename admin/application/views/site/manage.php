<?php
$system_logo = $this->db->get_where('tbl_settings' , array('type'=>'logo'))->row()->description;
$system_icon = $this->db->get_where('tbl_settings' , array('type'=>'icon'))->row()->description;
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Site Management<small> </small></h3>

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
                    echo form_open('site_management/do_update/', $attribute);
                    ?>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="shop_name">
                                Shop Name
                            </label>
                            <input type="text" class="form-control m-input" id="shop_name" name="shop_name" placeholder="Enter Shop Name" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('shop_name'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="phone">
                                Phone
                            </label>
                            <input type="text" class="form-control m-input" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('phone'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat">
                                Alamat
                            </label>
                            <textarea class="form-control m-input" id="address" name="address" rows="3"><?php echo $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description; ?></textarea>
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('address'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="email">
                                Email
                            </label>
                            <input type="email" class="form-control m-input" id="email" name="email" placeholder="Enter Email" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="password">
                                Password Email
                            </label>
                            <input type="text" class="form-control m-input" id="password" name="password" placeholder="Enter Password Email" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'password'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('password'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="author">
                                Author
                            </label>
                            <input type="text" class="form-control m-input" id="author" name="author" placeholder="Enter Author Name" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'author'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('author'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="description">
                                Description
                            </label>
                            <textarea class="form-control m-input" id="description" name="description" rows="6"><?php echo $this->db->get_where('tbl_settings', array('type' => 'description'))->row()->description; ?></textarea>
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('description'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="keyword">
                                Keyword
                            </label>
                            <textarea class="form-control m-input" id="keyword" name="keyword" rows="3"><?php echo $this->db->get_where('tbl_settings', array('type' => 'keyword'))->row()->description; ?></textarea>
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('keyword'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="metatext">
                                Metatext
                            </label>
                            <textarea class="form-control m-input" id="metatext" name="metatext" rows="6"><?php echo $this->db->get_where('tbl_settings', array('type' => 'metatext'))->row()->description; ?></textarea>
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('metatext'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="tagline">
                                Tagline
                            </label>
                            <input type="text" class="form-control m-input" id="tagline" name="tagline" placeholder="Enter tagline" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'tagline'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('tagline'); ?></div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="rekening">
                                No Rekening
                            </label>
                            <input type="text" class="form-control m-input" id="rekening_pembayaran" name="rekening_pembayaran" placeholder="Enter No Rekening" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'rekening_pembayaran'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('rekening_pembayaran'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="facebook">
                                Facebook
                            </label>
                            <input type="text" class="form-control m-input" id="facebook" name="facebook" placeholder="Enter Facebook" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'facebook'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('facebook'); ?></div>
                        </div>
                        <div class="form-group row">
                            <label for="instagram">
                                Instagram
                            </label>
                            <input type="text" class="form-control m-input" id="instagram" name="instagram" placeholder="Enter Instagram" value="<?php echo $this->db->get_where('tbl_settings', array('type' => 'instagram'))->row()->description; ?>">
                            <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('instagram'); ?></div>
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

            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Logo</h3>
                    </div>

                    <?php echo form_open_multipart('site_management/upload_logo', 'class=m-form'); ?>
                    <div class="card-body">
                        <?php
                        $path_img = base_url() . 'assets/logo/' . $system_logo;
                        if ($system_logo != "") { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">
                                    Logo
                                </label>
                                <div class="col-sm-10">
                                    <img src="<?= $path_img ?>" width="" style="width: 100%;">
                                </div>
                            </div>

                        <?php } ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ganti Logo</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="name_field">

                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('logo'); ?></div>
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

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Icon</h3>
                    </div>

                    <?php echo form_open_multipart('site_management/upload_icon', 'class=m-form'); ?>
                    <div class="card-body">
                        <?php
                        $path_img = base_url() . 'assets/icon/' . $system_icon;
                        if ($system_icon != "") { ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">
                                    Icon
                                </label>
                                <div class="col-sm-10">
                                    <img src="<?= $path_img ?>" width="" style="width: 100%;">
                                </div>
                            </div>

                        <?php } ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ganti Icon</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="name_field">

                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('logo'); ?></div>
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
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>