<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SISTEM ARSIP DIGITAL | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/morris/morris.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-cog"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url(); ?>dashboard/profil" class="dropdown-item">
              <i class="fas fa-user-circle"></i> profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url(); ?>dashboard/gantipass" class="dropdown-item">
              <i class="fas fa-user-edit"></i> Ganti Password
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url(); ?>dashboard/index" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/images/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Arsip Digital</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
            // Cek level user
            #######################################################################################################
            // Petugas
            if ($this->session->userdata('level') == 'petugas') { // Jika role-nya Kepala Bagian
              $kk = $this->uri->segment(2);
            ?>

              <li class="nav-item has-treeview menu-open">
                <a href="<?php echo base_url(); ?>dashboard/index" class="nav-link
                <?php if ($kk == 'index') {
                  echo 'active';
                } ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/lihat_kategori" class="nav-link <?php if ($kk == 'kategori') {
                                                                                              echo 'active';
                                                                                            } ?>">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Data Kategori
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/user" class="nav-link <?php if ($kk == 'user') {
                                                                                    echo 'active';
                                                                                  } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Staff
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/arsip" class="nav-link <?php if ($kk == 'arsip') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Data Arsip</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/profil" class="nav-link <?php if ($kk == 'profil') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Pengaturan Profil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Login/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Log out</p>
                </a>
              </li>


            <?php
              ################################################################################################################
              // camat
            } else if ($this->session->userdata('level') == 'camat') {
              $kk = $this->uri->segment(2);
            ?>

              <li class="nav-item has-treeview menu-open">
                <a href="<?php echo base_url(); ?>dashboard/index" class="nav-link <?php if ($kk == 'index') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/lihat_kategori" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Data Kategori
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/camat_petugas" class="nav-link <?php if ($kk == 'camat_petugas') {
                                                                                              echo 'active';
                                                                                            } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Kepala Bagian
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/lihat_user" class="nav-link <?php if ($kk == 'user') {
                                                                                          echo 'active';
                                                                                        } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Staff
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/arsip" class="nav-link <?php if ($kk == 'arsip') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Data Arsip</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/profil" class="nav-link <?php if ($kk == 'profil') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Pengaturan Profil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Login/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Log out</p>
                </a>
              </li>
            <?php
              #############################################################################################################
              // admin
            } else if ($this->session->userdata('level') == 'admin') {
              $kk = $this->uri->segment(2);
            ?>

              <li class="nav-item has-treeview menu-open">
                <a href="<?php echo base_url(); ?>dashboard/index" class="nav-link <?php if ($kk == 'index') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/lihat_kategori" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Data Kategori
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/petugas" class="nav-link <?php if ($kk == 'petugas') {
                                                                                        echo 'active';
                                                                                      } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Kepala Bagian
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/user" class="nav-link <?php if ($kk == 'user') {
                                                                                    echo 'active';
                                                                                  } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Staff
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/arsip" class="nav-link <?php if ($kk == 'arsip') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Data Arsip</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/profil" class="nav-link <?php if ($kk == 'profil') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Pengaturan Profil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Login/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Log out</p>
                </a>
              </li>
            <?php
              #############################################################################################################
              // User
            } else if ($this->session->userdata('level') == 'user') {
              $kk = $this->uri->segment(2);
            ?>

              <li class="nav-item has-treeview menu-open">
                <a href="<?php echo base_url(); ?>dashboard/index" class="nav-link <?php if ($kk == 'index') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="<?php echo base_url(); ?>dashboard/kategori" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Data Kategori
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/arsip" class="nav-link <?php if ($kk == 'arsip') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Data Arsip</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard/profil" class="nav-link <?php if ($kk == 'profil') {
                                                                                      echo 'active';
                                                                                    } ?>">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Pengaturan Profil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Login/logout" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Log out</p>
                </a>
              </li>

            <?php } ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>