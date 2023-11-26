<!-- Main Sidebar Container -->
<div class="wrapper">

  <aside class="main-sidebar sidebar-dark-primary elevation-5">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('Home/index'); ?>" class="brand-link">
      <img src="dist/img/logo uin.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">Informatika UIN Malang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



          <li class="nav-item">
            <a href="<?php echo site_url('Home/index'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="<?php echo site_url('Karyawan/viewAllKaryawan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Karyawan/formCreateKaryawan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                METODE SAW
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="<?php echo site_url('SAW/viewMatriksTernormalisasi'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matriks Ternormalisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('SAW/viewHasil'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Hasil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('SAW/viewRanking'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Ranking</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                METODE WP
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              
              <li class="nav-item">
                <a href="<?php echo site_url('WP/viewHasil'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Hasil</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                METODE MOORA
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              
              <li class="nav-item">
                <a href="<?php echo site_url('MOORA/viewNormalisasi'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Normalisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('MOORA/viewNilaiOptimasi'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Nilai Optimasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('MOORA/viewHasil'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Hasil</p>
                </a>
              </li>
             
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo uin.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->