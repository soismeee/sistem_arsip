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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
                        <li class="breadcrumb-item active">DataArsip</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-primary">Tambah data</button>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="8%">No</th>
                                    <th>Nama Arsip</th>
                                    <th>Nomer Arsip</th>
                                    <th>Tanggal Diarsipkan </th>
                                    <th>Pengelola </th>
                                    <th>Kategori Arsip </th>
                                    <th>Isi Ringkasan </th>
                                    <th style="width: 40px">Opsi</th>
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
                                        <td><?php echo $a->tgl_surat; ?></td>
                                        <td><?php echo $a->jabatan; ?></td>
                                        <td><?php echo $a->nama_kategori; ?></td>
                                        <td><?php echo $a->isi_ringkasan; ?></td>
                                        <td><span class="badge bg-primary"><a href="<?php echo base_url() . 'dashboard/detail_arsip/' . $a->id_arsip; ?>">Detail</a></span></td>
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