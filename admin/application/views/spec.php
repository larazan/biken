
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Product </h3>

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
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php
                    $attribute = array('class' => '');
                    echo form_open('product/spec/' . $update_id, $attribute);
                    ?>

                    <div class="card-body">
                        
                       
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

