<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\KriteriaModel;

class Karyawan extends BaseController
{

    public function viewAllKaryawan()
    {
        $karyawan = new KaryawanModel();
        $dataAllKaryawan = $karyawan->getAllKaryawan();
        $data = array("dataAllKaryawan" => $dataAllKaryawan);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View("Karyawan/ViewAllKaryawan", $data);
        echo View('AdminFooter');
    }

    public function createKaryawan()
    {
        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');
        $status = $this->request->getPost('status');
        $pendidikan = $this->request->getPost('pendidikan');
        $lama_kerja = $this->request->getPost('lama_kerja');
        $kehadiran = $this->request->getPost('kehadiran');

        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'status' => $status,
            'pendidikan' => $pendidikan,
            'lama_kerja' => $lama_kerja,
            'kehadiran' => $kehadiran,
        ];

        $karyawan = new KaryawanModel();
        $createKaryawan = $karyawan->saveKaryawan($data);
        $this->viewAllKaryawan();
    }

    public function formCreateKaryawan()
    {
        $kriteria = new KriteriaModel();
        $kriteriaStatus = $kriteria->getKriteriaStatus();
        $kriteriaPendidikan = $kriteria->getKriteriaPendidikan();
        $kriteriaLamaKerja = $kriteria->getKriteriaLamaKerja();
        $kriteriaKehadiran = $kriteria->getKriteriaKehadiran();

        $data = array(
            'kriteriaStatus' => $kriteriaStatus,
            'kriteriaPendidikan' => $kriteriaPendidikan,
            'kriteriaLamaKerja' => $kriteriaLamaKerja,
            'kriteriaKehadiran' => $kriteriaKehadiran,
        );

        echo View('AdminHeader');
        echo View('AdminNav');
        echo View("Karyawan/CreateKaryawan", $data);
        echo View('AdminFooter');



    }

    public function formUpdateKaryawan($nip)
    {
        $kriteria = new KriteriaModel();
        $kriteriaStatus = $kriteria->getKriteriaStatus();
        $kriteriaPendidikan = $kriteria->getKriteriaPendidikan();
        $kriteriaLamaKerja = $kriteria->getKriteriaLamaKerja();
        $kriteriaKehadiran = $kriteria->getKriteriaKehadiran();

        
        $karyawan = new KaryawanModel();
        $getKaryawan = $karyawan->getKaryawan($nip);
        $data = array(
            'karyawan' => $getKaryawan,
            'kriteriaStatus' => $kriteriaStatus,
            'kriteriaPendidikan' => $kriteriaPendidikan,
            'kriteriaLamaKerja' => $kriteriaLamaKerja,
            'kriteriaKehadiran' => $kriteriaKehadiran,
        );

        echo View('AdminHeader');
        echo View('AdminNav');
        echo View("Karyawan/UpdateKaryawan", $data);
        echo View('AdminFooter');
    }

    public function updateKaryawan($nip)
    {
        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');
        $status = $this->request->getPost('status');
        $pendidikan = $this->request->getPost('pendidikan');
        $lama_kerja = $this->request->getPost('lama_kerja');
        $kehadiran = $this->request->getPost('kehadiran');

        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'status' => $status,
            'pendidikan' => $pendidikan,
            'lama_kerja' => $lama_kerja,
            'kehadiran' => $kehadiran,
        ];
        $where = ['nip' => $nip];
        $table = 'tb_karyawan';
        $karyawan = new KaryawanModel();
        $createKaryawan = $karyawan->updateKaryawan($table, $data, $where);
        $this->viewAllKaryawan();
    }

    public function deleteKaryawan($nip){
        $karyawan = new KaryawanModel();
        $karyawan->deleteKaryawan($nip);
        $this->viewAllKaryawan();
    }






}