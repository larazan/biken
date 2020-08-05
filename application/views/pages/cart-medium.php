<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<style>
  .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
  }
  @media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
      width:20%;
      display: inline !important;
    }
    .actions .btn{
      width:36%;
      margin:1.5em 0;
    }
    
    .actions .btn-info{
      float:left;
    }
    .actions .btn-danger{
      float:right;
    }
    
    table#cart thead { display: none; }
    table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
    table#cart tbody tr td:first-child { background: #333; color: #fff; }
    table#cart tbody td:before {
      content: attr(data-th); font-weight: bold;
      display: inline-block; width: 8rem;
    }
  }
</style>
  <body>
    <!-- HEADER -->
    <?php include 'application/views/layouts/header-medium.php' ?>
    <!-- /HEADER -->
    <!-- NAVIGATION -->
    <?php include 'application/views/layouts/navbar-medium.php' ?>
    <!-- /NAVIGATION -->
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb-tree">
              <li><a href="<?= base_url()?>homes-medium">Home</a></li>
              <li class="active">My Cart</li>
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
      <!-- <div class="container">
        <div class="row">
          <div class="col-md-12 table-responsive">
            <table class="table table-hover" width="100%">
              <thead>
                <tr>
                  <th class="col-md-3">Product</th>
                  <th class="col-md-1">Quantity</th>
                  <th class="col-md-2 text-center">Price</th>
                  <th class="col-md-2 text-center">Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="maincartlist">
                <?= $cartMainList; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="text-right">
                    <h3>Sub Total</h3>
                  </td>
                  <td class="text-right">
                    <h3>Rp<span name="subMainList"><?= $subMainList;?></span></h3>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" class="text-right">
                    <a href="<?= base_url()?>shoplist/1" class="btn btn-default">Continue Shopping</a>
                  </td>
                  <td>
                    <a href="<?= base_url()?>ordercheckout/<?= $token; ?>" type="button" class="btn btn-success">Checkout</a>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div> -->

      <div class="container">
        <table id="cart" class="table table-hover table-condensed">
          <thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:8%">Quantity</th>
							<th style="width:10%">Price</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
          </thead>
          <tbody id="maincartlist"><?= $cartMainList;?></tbody>
          <tfoot>
            <tr class="visible-xs">
							<td class="text-center"><strong>Total Rp<span name="subMainList"><?= $subMainList;?></span></strong></td>
						</tr>
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total Rp<span name="subMainList"><?= $subMainList;?></span></strong></td>
							<td><a href="<?= base_url()?>ordercheckout" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
          </tfoot>
        </table>
      </div>
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
    <script src="<?= base_url()?>assets/theme/js/addon.js"></script>
</body>

</html>