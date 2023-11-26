<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Data Karyawan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Home/index') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Karyawan</li>
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
                            <h3 class="card-title">Form Data Karyawan</h3>
                        </div>


                        <form method="POST" action="/Karyawan/createKaryawan">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP Karyawan</label>
                                    <input type="text" class="form-control" id="nip" name="nip"
                                        placeholder="Enter NIP Karyawan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Enter Nama Karyawan">
                                </div>
                                
                                <div class="form-group">
                                    <label>Status Karyawan</label>
                                    <select class="form-control" name="status">
                                    <?php $no=0; foreach($kriteriaStatus as $row):$no++; ?>
                                    <option value='<?=$row->id_subkriteria;?>'><?=$row->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Karyawan</label>
                                    <select class="form-control" name="pendidikan">
                                    <?php $no=0; foreach($kriteriaPendidikan as $row):$no++; ?>
                                    <option value='<?=$row->id_subkriteria;?>'><?=$row->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lama Kerja Karyawan</label>
                                    <select class="form-control" name="lama_kerja">
                                    <?php $no=0; foreach($kriteriaLamaKerja as $row):$no++; ?>
                                    <option value='<?=$row->id_subkriteria;?>'><?=$row->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kehadiran Karyawan</label>
                                    <select class="form-control" name="kehadiran">
                                    <?php $no=0; foreach($kriteriaKehadiran as $row):$no++; ?>
                                    <option value='<?=$row->id_subkriteria;?>'><?=$row->keterangan;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>