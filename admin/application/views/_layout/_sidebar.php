<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url()?>dashboard" class="nav-link  <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>user/manage" class="nav-link <?= ($this->uri->segment(1) == 'user') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              Users
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>customer/manage" class="nav-link <?= ($this->uri->segment(1) == 'customer') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Customer
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>order/manage" class="nav-link <?= ($this->uri->segment(1) == 'order') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Order
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>payment/manage" class="nav-link <?= ($this->uri->segment(1) == 'payment') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-credit-card"></i>
            <p>
              Payment
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>bank/manage" class="nav-link <?= ($this->uri->segment(1) == 'bank') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-university"></i>
            <p>
              Bank
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>product/manage" class="nav-link <?= ($this->uri->segment(1) == 'product') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-gift"></i>
            <p>
              Product
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>brand/manage" class="nav-link <?= ($this->uri->segment(1) == 'brand') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-bookmark"></i>
            <p>
              Brand
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>category/manage" class="nav-link <?= ($this->uri->segment(1) == 'category') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Category
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>color/manage" class="nav-link <?= ($this->uri->segment(1) == 'color') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-cube"></i>
            <p>
              Color
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>size/manage" class="nav-link <?= ($this->uri->segment(1) == 'size') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-object-ungroup"></i>
            <p>
              Size
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>article/manage" class="nav-link <?= ($this->uri->segment(1) == 'article') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-pdf"></i>
            <p>
              Article
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>banner/manage" class="nav-link <?= ($this->uri->segment(1) == 'banner') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
              Banner
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url()?>contact/manage" class="nav-link <?= ($this->uri->segment(1) == 'contact') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-phone"></i>
            <p>
              Contact
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>