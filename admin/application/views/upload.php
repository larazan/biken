<!DOCTYPE html>
<head>
    <title>jQuery uploadHBR Plugin Example</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link id="bootstrap-styleshhet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/flatly/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url()?>assets/multipleUpload/dist/css/style.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="<?=base_url()?>assets/multipleUpload/dist/js/uploadHBR.min.js"></script>
    <script>
        $(document).ready(function () {
            uploadHBR.init({
                "target": "#uploads",
                "textNew": "ADD",
                "textTitle": "Click here or drag to upload an imagem",
                "textTitleRemove": "Click here remove the imagem"
            });
            $('#reset').click(function () {
                uploadHBR.reset('#uploads');
            });
        });
    </script>
    <style>
    body { background-color: #fafafa; }
    .container { margin: 150px auto; }
</style>
</head>
<body>
   
    <div class="container">
        <h1 class="text-center">jQuery uploadHBR Plugin Example</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 text-center">
                <form role="form" action="<?=base_url()?>Upload/process" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="col-md-12 col-lg-12 col-xs-12" id="columns">
                                <h3 class="form-label">Select the images</h3>
                                <div class="desc"><p class="text-center">or drag to box</p></div>
                                <div id="uploads"><!-- Upload Content --></div>
                            </div>
                            <div class="clearfix"></div>
                            <button class="btn btn-danger btn-lg pull-left" id="reset" type="button" ><i class="fa fa-history"></i> Clear</button>
                            <button class="btn btn-primary btn-lg pull-right" type="submit" ><i class="fa fa-upload"></i> Upload </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
