<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Matriks Ternormalisasi </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Home/index') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Matriks Ternormalisasi</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Matriks Ternormalisasi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Pendidikan</th>
                                        <th>Lama Kerja</th>
                                        <th>Kehadiran</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($dataSAW as $row):
                                        $no++; ?>
                                        <tr>
                                            <td>
                                                <?= $no; ?>
                                            </td>
                                            <td>
                                                <?=$row->nama; ?>
                                            </td>
                                            <td>
                                                <?=$row->nilai_minmaxStatus."/".$row->bobot_Status."=".$row->bobot_StatusMatriks; ?>
                                            </td>
                                            <td>
                                            <?=$row->bobot_Pendidikan."/".$row->nilai_minmaxPendidikan."=".$row->bobot_PendidikanMatriks; ?>
                                            </td>
                                            <td>
                                            <?=$row->bobot_LamaKerja."/".$row->nilai_minmaxLamaKerja."=".$row->bobot_LamaKerjaMatriks; ?>
                                            </td>
                                            <td>
                                            <?=$row->bobot_Kehadiran."/".$row->nilai_minmaxKehadiran."=".$row->bobot_KehadiranMatriks; ?>
                                            </td>

                                        

                                    
                                        </tr>
                                    <?php endforeach; ?>
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
    </section>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
        // Inisialisasi DataTable
        $('#example1').DataTable({
            "order": [[3, "desc"]] // Urutkan berdasarkan kolom 'Total' secara descending
        });
    });
</script>