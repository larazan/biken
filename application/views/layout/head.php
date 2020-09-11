<?php
$shop_name = $this->db->get_where('tbl_settings', array('type' => 'shop_name'))->row()->description;
$shop_address = $this->db->get_where('tbl_settings', array('type' => 'address'))->row()->description;
$shop_phone = $this->db->get_where('tbl_settings', array('type' => 'phone'))->row()->description;
$shop_email = $this->db->get_where('tbl_settings', array('type' => 'email'))->row()->description;

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type='text/css'>
    <link href='<?=base_url()?>assets/fonts/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='<?=base_url()?>assets/fonts/lovelo/stylesheet.css' rel='stylesheet' type='text/css'>

    <link href='<?=base_url()?>assets/css/owl.carousel.css' rel='stylesheet' type='text/css'>
    <link href='<?=base_url()?>assets/css/owl.theme.css' rel='stylesheet' type='text/css'>
    <link href="<?=base_url()?>assets/rs-plugin/css/settings.css" rel="stylesheet" type='text/css'>
    <link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet" type='text/css'>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    .tz-breadcrumbs li {
        padding-right: 10px;
    }
    .tz-breadcrumbs li:after {
        content: "/";
    }
    .shop-images {
        margin-top: 20px;
    }
    .blog {
        background-color: #fff;
    }
</style>
</head>