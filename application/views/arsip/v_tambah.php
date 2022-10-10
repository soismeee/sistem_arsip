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
                <h3 class="card-title">Tambah Arsip</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>dashboard/create_arsip" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kode">Nama surat</label>
                    <input type="text" class="form-control" name="nama_arsip" id="nama_arsip" value="<?php echo set_value('nama_arsip'); ?>" placeholder="Masukkan nama surat">
                    <?php echo form_error('nama_arsip'); ?>
                    <input type="hidden" name="pengelola" value="<?php echo $_SESSION['id']; ?>" id="pengelola">
                    <input type="hidden" name="petugas" value="<?php echo $_SESSION['id_petugas']; ?>" id="petugas">
                  </div>
                  <div class="form-group">
                    <label for="kode">Nomer surat</label>
                    <input type="text" class="form-control" name="no_arsip" id="no_arsip" value="<?php echo set_value('no_arsip'); ?>" placeholder="Masukkan nomer surat">
                    <?php echo form_error('no_arsip'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Tanggal surat</label>
                    <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" value="<?php echo set_value('tgl_surat'); ?>" placeholder="Masukkan tgl_surat">
                    <?php echo form_error('tgl_surat'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Isi ringkasan</label>
                    <textarea name="isi_ringkasan" class="form-control" cols="30" rows="5" placeholder="Isikan rincian"></textarea>
                    <?php echo form_error('isi_ringkasan'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Kategori arsip</label>
                    <!-- <input type="text" class="form-control" name="kategori_arsip" id="kategori_arsip" placeholder="Masukkan kategori arsip"> -->
                    <select name="kategori_arsip" class="form-control">
                      <option value="">Pilih Kategori</option>
                      <?php foreach ($kategori as $k) : ?>
                        <option value="<?php echo $k->kode_kategori ?>"><?php echo $k->nama_kategori ?></option>
                      <?php endforeach ?>
                    </select>
                    <?php echo form_error('kategori_arsip'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama">Upload gambar</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                    <?php echo form_error('gambar'); ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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