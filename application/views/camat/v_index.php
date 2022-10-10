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
                <div class="row">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Sistem Arsip Digital</strong></h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <center>
                                    Selamat datang, <b><?= $this->session->userdata('nama'); ?></b> di halaman dashboard pengguna Sistem Arsip Digital. Pada aplikasi ini Anda dapat melihat semua arsip anda<br />
                                    Anda dapat membuat sebuah arsip, mengedit dan menghapus arsip yang telah dibuat.<br />
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
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
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-friends"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Kepala Bagian</span>
                                <span class="info-box-number"><?php echo $petugas ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Staff</span>
                                <span class="info-box-number"><?php echo $user ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
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

                    <div class="col-md-12">
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Tanggal</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="tanggal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <script type="text/javascript">
                                    var ctx = document.getElementById('tanggal').getContext('2d');
                                    var chart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: [
                                                // 'Kategori', 'Kepala Bagian', 'Staff', 'Arsip'
                                                <?php
                                                if (count($chart) > 0) {
                                                    foreach ($chart as $data) {
                                                        echo "'" . date('F Y', strtotime($data->tgl_surat)) . "',";
                                                        // echo "'" . $data->tgl_surat . "',";
                                                    }
                                                }
                                                ?>
                                            ],
                                            datasets: [{
                                                label: 'Jumlah Arsip',
                                                backgroundColor: 'rgba(60,141,188,0.9)',
                                                borderColor: 'rgba(60,141,188,0.8)',
                                                pointRadius: false,
                                                pointColor: '#3b8bba',
                                                pointStrokeColor: 'rgba(60,141,188,1)',
                                                pointHighlightFill: '#fff',
                                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                                data: [
                                                    <?php
                                                    // echo $bulan
                                                    if (count($tanggal) > 0) {
                                                        foreach ($tanggal as $data) {
                                                            // echo "'" . date('d', strtotime($data->tgl_surat)) . "',";
                                                            echo "'" . $data->petugas . "',";
                                                        }
                                                    }
                                                    ?>
                                                ]
                                            }]
                                        },
                                    });
                                </script>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->