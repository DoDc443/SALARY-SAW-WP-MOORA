<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Karyawan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Home/index') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Karyawan</li>
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
                            <h3 class="card-title">Data Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama Karyawan</th>
                                        <th>Status</th>
                                        <th>Pendidikan</th>
                                        <th>Lama Kerja</th>
                                        <th>Kehadiran</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($dataAllKaryawan as $row):
                                        $no++; ?>
                                        <tr>
                                            <td>
                                                <?= $no; ?>
                                            </td>
                                            <td>
                                                <?= $row->nip; ?>
                                            </td>
                                            <td>
                                                <?= $row->nama; ?>
                                            </td>
                                            <td>
                                                <?= $row->keterangan_status; ?>
                                            </td>
                                            <td>
                                                <?= $row->keterangan_pendidikan; ?>
                                            </td>
                                            <td>
                                                <?= $row->keterangan_lama_kerja; ?>
                                            </td>
                                            <td>
                                                <?= $row->keterangan_kehadiran; ?>
                                            </td>

                                        
                                            <td>
                                                <a href="/Karyawan/formUpdateKaryawan/<?=$row->nip;?>">Edit</a>
                                                <a href="/Karyawan/deleteKaryawan/<?=$row->nip;?>">Hapus</a>
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