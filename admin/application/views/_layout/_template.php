<!DOCTYPE html>
<html>
  <head>
    <title>AdminCRUD | Dashboard</title>
    <!-- meta -->
    <?php echo @$_meta; ?>

    <!-- css --> 
    <?php echo @$_css; ?>

  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- header -->
      <?php echo @$_header; ?> <!-- nav -->
      
      <!-- sidebar -->
      <?php echo @$_sidebar; ?>
      
      <!-- content -->
      <?php echo @$_content; ?> <!-- headerContent --><!-- mainContent -->
    
      <!-- footer -->
      <?php echo @$_footer; ?>
    
      <div class="control-sidebar-bg"></div>
    </div>

    <!-- js -->
    <?php echo @$_js; ?>
  </body>
</html>