<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>

    
<body>
    <!-- HEADER -->
    <?php include 'application/views/layouts/header.php' ?>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <?php include 'application/views/layouts/navbar.php' ?>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Profiles</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <style>
        .tracking {
            padding: 80px 0;
            background: #19beda;
        }

        .tracking .content {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .tracking .content h2 {
            color: #243c4f;
            margin-bottom: 40px;
        }

        .tracking .content .form-control {
            height: 50px;
            border-color: #ffffff;
            border-radius: 0;
        }

        .tracking .content.form-control:focus {
            box-shadow: none;
            border: 2px solid #243c4f;
        }

        .tracking .content .btn {
            min-height: 50px;
            border-radius: 0;
            background: #243c4f;
            color: #fff;
            font-weight: 600;
        }
    </style>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="col-md-12 offset-md-3">
                        <span class="anchor" id="formPayment"></span>
                        <hr class="my-5">

                        <!-- form card cc payment -->
                        <div class="card card-outline-secondary">
                            <div class="card-body">
                                <h3 class="text-center">Payment Confirmation</h3>
                                <hr>
                                <div class="alert alert-info p-2 pb-3">
                                    <a class="close font-weight-normal initialism" data-dismiss="alert" href="#"><samp>×</samp></a>
                                    CVC code is required.
                                </div>
                                <form class="form" role="form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="First and last name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="rekening">Rekening</label>
                                        <input type="text" class="form-control" id="rekening" name="rekening" placeholder="No rekening" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="bank">Bank</label>
                                        <select name="bank" class="form-control">
                                            <option value="">Bank BCA</option>
                                            <option value="">Bank Mandiri</option>
                                            <option value="">Bank BNI46</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Total</label>
                                        <input type="text" class="form-control" id="total" name="total" placeholder="Total payment" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_payment">Date payment</label>
                                        <input type="text" class="form-control" id="date_payment datepicker" name="date_payment" placeholder="date payment" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control textarea" rows="3" placeholder="Description" id="description" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Upload File</label>
                                        <input type="file" class="form-control" id="total" name="total" placeholder="Total payment" required="required">
                                    </div>
                                    

                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /form card cc payment -->

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>

            <!-- /container -->
        </div>
        <!-- /SECTION -->

        <!-- NEWSLETTER -->
        <?php include 'application/views/layouts/newsletter.php' ?>
        <!-- /NEWSLETTER -->

        <!-- FOOTER -->
        <?php include 'application/views/layouts/footer.php' ?>
        <!-- /FOOTER -->
        
        
        <!-- jQuery Plugins -->
        <?php include 'application/views/layouts/jspack.php' ?>
        <script>
            $(document).ready(function() {
                $('.details-slick').slick();
            });
        </script>
        <script>
           
           $('#datepicker').datepicker({
               uiLibrary: 'bootstrap'
           });
        </script> 
</body>

</html>