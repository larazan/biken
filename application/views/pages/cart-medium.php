<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
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
      <div class="container">
        <div class="row">
          <div class="col-md-12table-responsive">
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
    <script src="<?= base_url()?>assets/theme/js/addon.js"></script>
</body>

</html>