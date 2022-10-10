  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Petugas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/petugas">Petugas</a></li>
              <li class="breadcrumb-item active">Form Input</li>
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
                <h3 class="card-title">Tambah Kepala Bagian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>dashboard/create_petugas" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kode">NIP</label>
                    <input type="text" class="form-control" name="username" id="kode" value="<?php echo set_value('username'); ?>" placeholder="Masukkan NIP">
                    <?php echo form_error('username'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Kepala</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan nama lengkap">
                    <?php echo form_error('nama'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Jabatan</label>
                    <select name="jabatan" class="form-control">
                      <option value="">Pilih Jabatan</option>
                      <option value="Kasubag Umum & Kepegawaian">KASUBAG UMUM & KEPEGAWAIAN</option>
                      <option value="Kasubag Keuangan">KASUBAG KEUANGAN</option>
                      <option value="Kasi Pemerintahan">KASI PEMERINTAHAN</option>
                      <option value="Kasi Kemasyarakatan">KASI KEMASYARAKATAN</option>
                      <option value="Kasi Pelayanan">KASI PELAYANAN</option>
                      <option value="Kasi Trantib">KASI TRANTIB</option>
                    </select>
                    <?php echo form_error('jabatan'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Password</label>
                    <input type="password" class="form-control" name="password" id="nama" placeholder="Masukkan password">
                    <?php echo form_error('password'); ?>
                  </div>
                  <input type="hidden" name="level" value="petugas">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?php echo base_url(); ?>dashboard/petugas" class="btn btn-danger">Batal</a>
                </div>
              </form>
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