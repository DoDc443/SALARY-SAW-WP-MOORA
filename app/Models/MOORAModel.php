<?php

namespace App\Models;

use CodeIgniter\Model;

class MOORAModel extends Model
{
    protected $table = '';

    function __construct()
    {
        $this->db = db_connect();
    }


    function viewMatriksTernormalisasi()
    {
        $dataquery = $this->db->query('SELECT
        k.nip,
        k.nama,
        sk_status.bobot_sk AS bobot_Status,
        sk_pendidikan.bobot_sk AS bobot_Pendidikan,
        sk_lama_kerja.bobot_sk AS bobot_LamaKerja,
        sk_kehadiran.bobot_sk AS bobot_Kehadiran
        FROM
            tb_karyawan k
        JOIN
            tb_subkriteria sk_status ON k.status = sk_status.id_subkriteria
        JOIN
            tb_subkriteria sk_pendidikan ON k.pendidikan = sk_pendidikan.id_subkriteria
        JOIN
            tb_subkriteria sk_lama_kerja ON k.lama_kerja = sk_lama_kerja.id_subkriteria
        JOIN
            tb_subkriteria sk_kehadiran ON k.kehadiran = sk_kehadiran.id_subkriteria;'
        );

        $minmax = $this->db->query("SELECT
                            tk.kriteria,
                            tk.kategori,
                            tk.bobot_k,
                                CASE
                                    WHEN tk.kategori = 'Cost' THEN MIN(ts.bobot_sk)
                                    WHEN tk.kategori = 'Benefit' THEN MAX(ts.bobot_sk)
                                    ELSE NULL
                                END AS nilai_minmax
                            FROM
                                tb_subkriteria ts
                            JOIN
                                tb_kriteria tk ON ts.id_kriteria = tk.id_kriteria
                            GROUP BY
                                tk.kriteria, tk.kategori,tk.bobot_k;"
        );

        $hasil = $dataquery->getResult();
        $hasilminmax = $minmax->getResult();

        // Menghitung jumlah kuadrat bobot_Status
        $sumStatus = array_reduce($hasil, function ($carry, $row) {
            return $carry + pow($row->bobot_Status, 2);
        }, 0);
        $sumPendidikan = array_reduce($hasil, function ($carry, $row) {
            return $carry + pow($row->bobot_Pendidikan, 2);
        }, 0);
        $sumLamaKerja = array_reduce($hasil, function ($carry, $row) {
            return $carry + pow($row->bobot_LamaKerja, 2);
        }, 0);
        $sumKehadiran = array_reduce($hasil, function ($carry, $row) {
            return $carry + pow($row->bobot_Kehadiran, 2);
        }, 0);

        // Menghitung akar kuadrat dari jumlah kuadrat bobot_Status
        $sqrtSumStatus = sqrt($sumStatus);
        $sqrtSumPendidikan = sqrt($sumPendidikan);
        $sqrtSumLamaKerja = sqrt($sumLamaKerja);
        $sqrtSumKehadiran = sqrt($sumKehadiran);

        // Menormalisasi bobot_Status
        foreach ($hasil as $row) {
            $row->bobot_StatusMatriks = $row->bobot_Status / $sqrtSumStatus;
            $row->bobot_PendidikanMatriks = $row->bobot_Pendidikan / $sqrtSumPendidikan;
            $row->bobot_LamaKerjaMatriks = $row->bobot_LamaKerja / $sqrtSumLamaKerja;
            $row->bobot_KehadiranMatriks = $row->bobot_Kehadiran / $sqrtSumKehadiran;
            foreach ($hasilminmax as $row2) {
                if ($row2->kriteria == 'Status') {
                    $row->bobot_kStatus = $row2->bobot_k;
                }
                if ($row2->kriteria == 'Pendidikan') {
                    $row->bobot_kPendidikan = $row2->bobot_k;
                }
                if ($row2->kriteria == 'LamaKerja') {
                    $row->bobot_kLamaKerja = $row2->bobot_k;
                }
                if ($row2->kriteria == 'Kehadiran') {
                    $row->bobot_kKehadiran = $row2->bobot_k;
                }
            }
        }

        return $hasil;
    }
    
    function viewNilaiOptimasi(){
        $data = $this->viewMatriksTernormalisasi();
        
        foreach($data as $row){
            $row->NOStatus = $row->bobot_StatusMatriks * $row->bobot_kStatus;
            $row->NOPendidikan = $row->bobot_PendidikanMatriks * $row->bobot_kPendidikan;
            $row->NOLamaKerja = $row->bobot_LamaKerjaMatriks * $row->bobot_kLamaKerja;
            $row->NOKehadiran = $row->bobot_KehadiranMatriks * $row->bobot_kKehadiran;
        }

        return $data;
    }


    function viewHasil()
    {
        $data = $this->viewNilaiOptimasi();

        foreach($data as $row){
            $row->MAX = $row->NOPendidikan+$row->NOLamaKerja+$row->NOKehadiran;
            $row->MIN = $row->NOStatus;
            $row->Y = $row->MAX - $row->MIN;
        }

        return $data;
    }



}