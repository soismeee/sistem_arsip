  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Arsip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Arsip</a></li>
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
                <h3 class="card-title">Edit Arsip</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($arsip as $a) { ?>
                <form role="form" action="<?php echo base_url(); ?>dashboard/update_arsip" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="kode">Nama Arsip</label>
                      <input type="hidden" name="id_arsip" value="<?php echo $a->id_arsip; ?>">
                      <input type="text" class="form-control" name="nama_arsip" id="nama_arsip" value="<?php echo $a->nama_arsip; ?>" placeholder="Masukkan nama arsip">
                      <?php echo form_error('nama_arsip'); ?>
                    </div>
                    <div class="form-group">
                      <label for="kode">Nomer Arsip</label>
                      <input type="text" class="form-control" name="no_arsip" id="no_arsip" value="<?php echo $a->no_arsip; ?>" placeholder="Masukkan nama arsip">
                      <?php echo form_error('no_arsip'); ?>
                    </div>
                    <div class="form-group">
                      <label for="nama">Tanggal Arsip</label>
                      <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" value="<?php echo $a->tgl_surat; ?>" placeholder="Masukkan tgl_surat">
                      <?php echo form_error('tgl_surat'); ?>
                    </div>
                    <div class="form-group">
                      <label for="nama">Kategori arsip</label>
                      <select name="kategori_arsip" class="form-control">
                        <?php foreach ($kategori as $k) { ?>
                          <option <?php if ($k->kode_kategori == $a->kategori_arsip) {
                                    echo 'selected="selected"';
                                  } ?> value="<?php echo $k->kode_kategori ?>"><?php echo $k->nama_kategori ?></option>
                        <?php } ?>
                      </select>
                      <?php echo form_error('kategori_arsip'); ?>
                    </div>
                    <div class="form-group">
                      <label for="nama">Isi ringkasan</label>
                      <input type="text" class="form-control" name="isi_ringkasan" id="isi_ringkasan" value="<?php echo $a->isi_ringkasan; ?>" placeholder="Masukkan isi ringkasan">
                      <?php echo form_error('isi_ringkasan'); ?>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('Dashboard/arsip'); ?>" class="btn btn-danger">Batal</a>
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