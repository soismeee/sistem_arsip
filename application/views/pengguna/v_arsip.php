<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Arsip</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataArsip</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <a href="<?= base_url('Dashboard/tambah_a'); ?>" class="btn btn-primary">Tambah Arsip</a>
          </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="2%">No</th>
                    <th width="8%">Nama Arsip</th>
                    <th width="8%">Nomer Arsip</th>
                    <th width="8%">Tanggal Diarsipkan </th>
                    <th width="8%">Nama Kategori</th>
                    <th width="8%">Isi Ringkasan </th>
                    <th width="2%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($arsip as $a) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $a->nama_arsip; ?></td>
                      <td><?php echo $a->no_arsip; ?></td>
                      <td><?php echo date('d F Y', strtotime($a->tgl_surat)); ?></td>
                      <td><?php echo $a->nama_kategori; ?></td>
                      <td><?php echo $a->isi_ringkasan; ?></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo base_url() . 'dashboard/detail_arsip/' . $a->id_arsip; ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                          <a href="<?php echo base_url() . 'dashboard/edit_arsip/' . $a->id_arsip; ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                          <!-- <a href="<?php echo base_url() . 'dashboard/hapus_arsip/' . $a->id_arsip; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>