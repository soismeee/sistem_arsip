  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title"><strong>Sistem Arsip Digital</strong></h3>
              </div> <!-- /.card-body -->
              <div class="card-body">
                <center>
                  Selamat datang, <b><?= $this->session->userdata('nama'); ?></b> di halaman dashboard pengguna Sistem Arsip Digital. Pada aplikasi ini Anda dapat melihat semua arsip anda<br />
                  Anda dapat membuat sebuah arsip, mengedit dan menghapus arsip yang telah dibuat.<br />
                </center>
              </div><!-- /.card-body -->
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.row -->
        <div class="row">
          <div class="col-6 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-table"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kategori Arsip</span>
                <span class="info-box-number">
                  <?php echo $kategori ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-6 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-pie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Arsip</span>
                <span class="info-box-number"><?php echo $arsip ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      </div>
    </section>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->