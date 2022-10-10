  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kategori</a></li>
              <li class="breadcrumb-item active">Form Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($kategori as $k) { ?>
                <form role="form" action="<?php echo base_url() . 'dashboard/update_kategori'; ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="kode">Kode Kategori</label>
                      <input type="hidden" name="id" value="<?php echo $k->id; ?>">
                      <input type="text" class="form-control" name="kode_kategori" id="kode" value="<?php echo $k->kode_kategori; ?>">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Kategori</label>
                      <input type="text" class="form-control" name="nama_kategori" id="nama" value="<?php echo $k->nama_kategori; ?>">
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              <?php } ?>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->