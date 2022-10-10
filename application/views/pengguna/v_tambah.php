  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/user">DataStaff</a></li>
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
                <h3 class="card-title">Tambah Staff</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>dashboard/create_user" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kode">NIP</label>
                    <input type="text" class="form-control" name="username" id="kode" value="<?php echo set_value('username'); ?>" placeholder="Masukkan NIP">
                    <?php echo form_error('username'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Staff</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan nama lengkap">
                    <?php echo form_error('nama'); ?>
                  </div>

                  <input type="hidden" name="level" value="user">
                  
                  <div class="form-group">
                    <label for="nama">Petugas</label>
                    <select name="id_petugas" class="form-control">
                      <option selected="selected" disabled="">Pilih Petugas</option>
                      <?php foreach ($pengguna as $p) : ?>
                        <option value="<?php echo $p->id ?>"><?php echo $p->nama ?></option>
                      <?php endforeach ?>
                    </select>
                    <?php echo form_error('id_petugas'); ?>
                  </div>
                  <!-- <input type="hidden" name="id_petugas" value="<?php echo $_SESSION['id']; ?>" id="id_petugas"> -->

                  <div class="form-group">
                    <label for="nama">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo set_value('jabatan'); ?>" placeholder="Masukkan jabatan staff">
                    <?php echo form_error('jabatan'); ?>
                  </div>

                  <div class="form-group">
                    <label for="nama">Password</label>
                    <input type="password" class="form-control" name="password" id="nama" placeholder="Masukkan password">
                    <?php echo form_error('password'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?php echo base_url(); ?>dashboard/user" class="btn btn-danger">Batal</a>
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