  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Data Arsip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active">DetailArsip</li>

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
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-tag"></i>
                  Detail data arsip
                </h3>
              </div>
              <!-- /.card-body -->
              <div class="card-body">
                <table class="table">
                  <?php
                  $no = 1;
                  foreach ($arsip as $a) {
                  ?>
                    <tr>
                      <td width="35%">Nama arsip</td>
                      <td width="1%">:</td>
                      <td width="38%"><?php echo $a->nama_arsip; ?></td>
                    </tr>
                    <tr>
                      <td>Nomor Arsip</td>
                      <td>:</td>
                      <td><?php echo $a->no_arsip; ?></td>
                    </tr>
                    <tr>
                      <td>tanggal arsip</td>
                      <td>:</td>
                      <td><?php echo $a->tgl_surat; ?></td>
                    </tr>
                    <tr>
                      <td>Pengelola</td>
                      <td>:</td>
                      <td><?php echo $a->nama; ?></td>
                    </tr>
                    <tr>
                      <td>kategori arsip</td>
                      <td>:</td>
                      <td><?php echo $a->nama_kategori; ?></td>
                    </tr>
                    <tr>
                      <td>Isi Ringkasan</td>
                      <td>:</td>
                      <td><?php echo $a->isi_ringkasan; ?></td>
                    </tr>
                  <?php } ?>
                </table>
              </div>

              <!-- /.card -->
            </div>
            <!-- /.card -->
            <a href="<?= base_url('Dashboard/arsip'); ?>" class="btn btn-primary">Kembali</a>

          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tag"></i>
                Gambar arsip
              </h3>
            </div>
            <div class="card-body">
              <iframe src="<?php echo base_url() . '/assets/images/arsip/' . $a->gambar; ?>" width="750px" height="500px"></iframe>
              <!-- <img src="<?php echo base_url() . '/assets/images/arsip/' . $a->gambar; ?>" width="50%" height="100%"> -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->