<!-- Content Wrapper. Contains page content -->
<!-- Pastikan Anda sudah memuat jQuery -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Ranking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Home/index') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Ranking</li>
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
                            <h3 class="card-title">Data Ranking</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="ranking" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Ranking</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>MAX</th>
                                        <th>MIN</th>
                                        <th>Y(Max-Min)</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    function compareY($a, $b)
                                    {
                                        return $b->Y * 1000000 - $a->Y * 1000000;
                                    }

                                    // Mengurutkan array menggunakan fungsi usort
                                    usort($dataMOORA, 'compareY');

                                    // Menampilkan hasil pengurutan
                                    // foreach ($dataSAW as $item) {
                                    //     echo "NIP: " . $item->nip . ", Nama: " . $item->nama . ", Total: " . $item->total . "<br>";
                                    // }
                                    $no = 0;
                                    foreach ($dataMOORA as $row):
                                        $no++; ?>
                                        <tr>
                                            <td>
                                                <?= $no; ?>
                                            </td>
                                            <td>
                                                <?= $row->nip; ?>
                                            </td>
                                            <td>
                                                <?= $row->nama ?>
                                            </td>
                                            <td>
                                               <?= $row->MAX ?>
                                            </td>
                                            <td>
                                            <?= $row->MIN ?>
                                        </td>
                                            <td>
                                            <?= $row->Y ?>
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