<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<style>
    .aboutus-title {
        font-size: 30px;
        letter-spacing: 0;
        line-height: 32px;
        margin: 0 0 39px;
        padding: 0 0 11px;
        position: relative;
        text-transform: uppercase;
        color: #000;
    }

    .aboutus-title::after {
        background: #fdb801 none repeat scroll 0 0;
        bottom: 0;
        content: "";
        height: 2px;
        left: 0;
        position: absolute;
        width: 54px;
    }

    .contact__leftside {
        width: 100%;
        float: left;
        -ms-flex-order: 1;
        -webkit-order: 1;
        order: 1;
        padding-right: 33px;
    }

    .contact__leftside h3 {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 17px;
        color: #535353;
        margin-bottom: 20px
    }

    .contact__leftside ul {
        list-style: none;
        padding: 0;
        margin: 0
    }

    .contact__leftside ul li {
        margin-bottom: 0
    }

    .contact__leftside ul li a {
        font-size: 13px;
        color: #212121;
        letter-spacing: .32px;
        border-left: 4px solid rgba(255, 255, 255, 0);
        padding: 0 23px;
        line-height: 36px;
        display: block
    }

    .contact__leftside ul li a:hover {
        color: #212121;
        border-left: 4px solid #d7d7d7;
        background: #efefef;
        text-decoration: none
    }

    .contact__leftside ul li.active a {
        color: #212121;
        border-left: 4px solid #d7d7d7;
        background: #efefef
    }
</style>

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

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact__leftside">
                        <h3>INFORMASI</h3>
                        <ul>
                            <li class="active"><a href="https://eraspace.com/erafone/tentang-kami/"> <span> Tentang Kami </span> </a></li>
                            <li><a href="https://eraspace.com/erafone/contact/"> <span> Hubungi Kami </span> </a></li>
                            <li class="parent"><a href="javascript:void(0);"> <span> FAQ </span> </a>
                                <ul>
                                    <li><a href="https://eraspace.com/erafone/registrasi/"><span>Registrasi</span></a></li>
                                    <li><a href="https://eraspace.com/erafone/belanja/"><span>Belanja</span></a></li>
                                    <li><a href="https://eraspace.com/erafone/promosi/"><span>Promosi</span></a></li>
                                    <li><a href="https://eraspace.com/erafone/pembayaran/"><span>Pembayaran</span></a></li>
                                    <li><a href="https://eraspace.com/erafone/pengiriman/"><span>Pengiriman</span></a></li>
                                </ul>
                            </li>
                            <li><a href="https://eraspace.com/erafone/stores/?nama-toko=&amp;storeType=erafone&amp;province=&amp;city="> <span> Cari Toko Terdekat </span> </a></li>
                            <li><a href="https://eraspace.com/erafone/privasi/"> <span> Privasi </span> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="cms-page-right">
                        <div class="page-title-wrapper">
                            <h2 class="aboutus-title">About Us</h2>
                        </div>
                        <p>Erafone.com merupakan satu-satunya online retail smartphone, gadget, IOT dan aksesoris pendukungnya di Indonesia yang memberikan pengalaman belanja online aman dan nyaman dengan jaminan orisinalitas serta garansi resmi untuk semua produk yang dijual dari berbagai merek ternama seperti Apple, Samsung, Xiaomi, Huawei, Oppo, Vivo, Nokia, Asus, Realme, Honor, Smartfren, DJI, GoPro, Garmin, JBL dan masih banyak lagi.</p>
                        <p>Erafone.com juga memberikan pengalaman berbelanja online yang tidak akan terlupakan dengan terintegrasinya website Erafone.com dengan ratusan toko Erafone yang tersebar di seluruh Indonesia sehingga memungkinkan untuk melakukan transaksi Online to Offline ataupun Offline to Online dengan beragam pilihan fasilitas pembayaran yang lengkap, mudah dan aman. &nbsp;</p>
                        <p>Erafone.com akan selalu berusaha memberikan penawaran menarik dan pelayanan terbaik seperti kemudahan pembayaran, fleksibilitas pemesanan (bias melalui website ataupun toko), fasilitas pengembalian produk, layanan konsumen dan layanan purna jual (after sales) yang terjamin karena Erafone.com memiliki kemitraan dan lisensi langsung dari pemegang merek ternama untuk semua produk yang dijual.</p>
                    </div>
                </div>
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
</body>

</html>