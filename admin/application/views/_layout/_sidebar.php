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
        <a href="#" class="d-block"><?= ucfirst($this->session->userdata('name')); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>dashboard" class="nav-link  <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-header">MANAJEMEN MASTER</li>
        <li class="nav-item has-treeview <?= ($this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'SubCategory' || $this->uri->segment(1) == 'SubSubCategory') ? 'menu-open' : '' ?>">
          <a href="" class="nav-link <?= ($this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'SubCategory' || $this->uri->segment(1) == 'SubSubCategory') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-bookmark"></i>
            <p>
              Kategori
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">



            <li class="nav-item">
              <a href="<?= base_url() ?>category/manage" class="nav-link <?= ($this->uri->segment(1) == 'category') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Category
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url() ?>SubCategory/manage" class="nav-link <?= ($this->uri->segment(1) == 'SubCategory') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  SubCategory
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url() ?>SubSubCategory/manage" class="nav-link <?= ($this->uri->segment(1) == 'SubSubCategory') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  SubSubCategory
                </p>
              </a>
            </li>


          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>brand/manage" class="nav-link <?= ($this->uri->segment(1) == 'brand') ? 'active' : '' ?>">
            <i class="fas fa-tags nav-icon"></i>
            <p>
              Brand
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>color/manage" class="nav-link <?= ($this->uri->segment(1) == 'color') ? 'active' : '' ?>">
            <i class="fas fa-database nav-icon"></i>
            <p>
              Color
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>size/manage" class="nav-link <?= ($this->uri->segment(1) == 'size') ? 'active' : '' ?>">
            <i class="fas fa-arrows-alt nav-icon"></i>
            <p>
              Size
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>article/manage" class="nav-link <?= ($this->uri->segment(1) == 'article') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-pdf"></i>
            <p>
              Article
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>banner/manage" class="nav-link <?= ($this->uri->segment(1) == 'banner') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-sticky-note"></i>
            <p>
              Banner
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>bank/manage" class="nav-link <?= ($this->uri->segment(1) == 'bank') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-university"></i>
            <p>
              Bank
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>kurir/manage" class="nav-link <?= ($this->uri->segment(1) == 'kurir') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-bus"></i>
            <p>
              Kurir
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-envelope-open"></i>
            <p>
              Subscribe
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?= base_url() ?>subscribe/manage" class="nav-link <?= ($this->uri->segment(1) == 'subscribe') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Subscribe List
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url() ?>category/manage" class="nav-link <?= ($this->uri->segment(1) == 'category') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Log Reply
                </p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-header">MANAJEMEN PRODUK</li>

        <li class="nav-item">
          <a href="<?= base_url() ?>product/manage" class="nav-link <?= ($this->uri->segment(1) == 'product') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-gift"></i>
            <p>
              Product
            </p>
          </a>
        </li>



        <li class="nav-header">MANAJEMEN PENJUALAN</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>order/manage" class="nav-link <?= ($this->uri->segment(1) == 'order' && $this->uri->segment(2) == 'manage') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Order
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>order/today" class="nav-link <?= ($this->uri->segment(1) == 'order' && $this->uri->segment(2) == 'today') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              Hari ini
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>order/unpaid" class="nav-link <?= ($this->uri->segment(2) == 'unpaid') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-exclamation-triangle"></i>
            <p>
              Belum Bayar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>order/pending" class="nav-link <?= ($this->uri->segment(2) == 'pending') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-clock"></i>
            <p>
              Pending
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>order/process" class="nav-link <?= ($this->uri->segment(2) == 'process') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-retweet"></i>
            <p>
              Diproses
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>order/send" class="nav-link <?= ($this->uri->segment(2) == 'send') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-ship"></i>
            <p>
              Dikirim
            </p>
          </a>
        </li>

        <li class="nav-header">MANAJEMEN TRANSAKSI</li>

        <li class="nav-item">
          <a href="<?= base_url() ?>transaction/manage" class="nav-link <?= ($this->uri->segment(1) == 'transaction') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-refresh"></i>
            <p>
              Transaksi
            </p>
          </a>
        </li>

        <li class="nav-header">MANAJEMEN LAPORAN</li>

        <li class="nav-item">
          <a href="<?= base_url() ?>payment/manage" class="nav-link <?= ($this->uri->segment(1) == 'payment') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-credit-card"></i>
            <p>
              Payment
            </p>
          </a>
        </li>

        <li class="nav-header">MANAJEMEN PENGGUNA</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>user/manage" class="nav-link <?= ($this->uri->segment(1) == 'user') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              Admin
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>customer/manage" class="nav-link <?= ($this->uri->segment(1) == 'customer') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Customer
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>contact/manage" class="nav-link <?= ($this->uri->segment(1) == 'contact') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-phone"></i>
            <p>
              Contact
            </p>
          </a>
        </li>


        <li class="nav-header">MANAJEMEN INFORMASI</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>information/tentang_kami" class="nav-link <?= ($this->uri->segment(1) == 'information') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>
              Informasi
            </p>
          </a>
        </li>

        


        <li class="nav-header">MANAJEMEN PENGATURAN</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>site/manage" class="nav-link <?= ($this->uri->segment(1) == 'site') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-globe"></i>
            <p>
              Situs
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>rajaongkir/manage" class="nav-link <?= ($this->uri->segment(1) == 'rajaongkir') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-truck"></i>
            <p>
              Raja Ongkir
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>location/manage" class="nav-link <?= ($this->uri->segment(1) == 'location') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-map-marker"></i>
            <p>
              Alamat Pengiriman
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>contact/manage" class="nav-link <?= ($this->uri->segment(1) == 'contact') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-cc-visa"></i>
            <p>
              Pembayaran
            </p>
          </a>
        </li>














      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>