<!-- Content Wrapper. Contains page content -->
<?php
$no = 0;
foreach ($karyawan as $row):
    $no++;
    ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Data Karyawan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Home/index') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Update Data Karyawan</li>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Update Data Karyawan</h3>
                        </div>


                        <form method="POST" action="/Karyawan/updateKaryawan/<?= $row->nip;?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP Karyawan</label>
                                    <input type="text" class="form-control" id="nip" name="nip" value="<?=$row->nip;?>"
                                        placeholder="Enter NIP Karyawan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?=$row->nama;?>"
                                        placeholder="Enter Nama Karyawan">
                                </div>
                                
                                <div class="form-group">
                                    <label>Status Karyawan</label>
                                    <select class="form-control" name="status">
                                    <?php $no=0; foreach($kriteriaStatus as $statusRow):$no++; ?>
                                    <option value='<?=$statusRow->id_subkriteria;?>' <?php echo ($row->status == $statusRow->id_subkriteria) ? 'selected' : ''; ?>><?=$statusRow->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Karyawan</label>
                                    <select class="form-control" name="pendidikan">
                                    <?php $no=0; foreach($kriteriaPendidikan as $pendidikanRow):$no++; ?>
                                    <option value='<?=$pendidikanRow->id_subkriteria;?>' <?php echo ($row->pendidikan == $pendidikanRow->id_subkriteria) ? 'selected' : ''; ?>  ><?=$pendidikanRow->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lama Kerja Karyawan</label>
                                    <select class="form-control" name="lama_kerja">
                                    <?php $no=0; foreach($kriteriaLamaKerja as $LamaKerjaRow):$no++; ?>
                                    <option value='<?=$LamaKerjaRow->id_subkriteria;?>' <?php echo ($row->lama_kerja == $LamaKerjaRow->id_subkriteria) ? 'selected' : ''; ?>  ><?=$LamaKerjaRow->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kehadiran Karyawan</label>
                                    <select class="form-control" name="kehadiran">
                                    <?php $no=0; foreach($kriteriaKehadiran as $kehadiranRow):$no++; ?>
                                    <option value='<?=$kehadiranRow->id_subkriteria;?>'  <?php echo ($row->kehadiran == $kehadiranRow->id_subkriteria) ? 'selected' : ''; ?> ><?=$kehadiranRow->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>