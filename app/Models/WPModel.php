<?php

namespace App\Models;

use CodeIgniter\Model;

class WPModel extends Model
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

        foreach ($hasil as $row) {

            foreach ($hasilminmax as $row2) {
                if ($row2->kriteria == 'Status') {
                    $row->bobot_StatusMatriks = $row2->nilai_minmax / $row->bobot_Status;
                    $row->nilai_minmaxStatus = $row2->nilai_minmax;
                    $row->bobot_kStatus = $row2->bobot_k;
                }
                if ($row2->kriteria == 'Pendidikan') {
                    $row->bobot_PendidikanMatriks = $row->bobot_Pendidikan / $row2->nilai_minmax;
                    $row->nilai_minmaxPendidikan = $row2->nilai_minmax;
                    $row->bobot_kPendidikan = $row2->bobot_k;
                }
                if ($row2->kriteria == 'LamaKerja') {
                    $row->bobot_LamaKerjaMatriks = $row->bobot_LamaKerja / $row2->nilai_minmax;
                    $row->nilai_minmaxLamaKerja = $row2->nilai_minmax;
                    $row->bobot_kLamaKerja = $row2->bobot_k;
                }
                if ($row2->kriteria == 'Kehadiran') {
                    $row->bobot_KehadiranMatriks = $row->bobot_Kehadiran / $row2->nilai_minmax;
                    $row->nilai_minmaxKehadiran = $row2->nilai_minmax;
                    $row->bobot_kKehadiran = $row2->bobot_k;
                }


            }
        }

        return $hasil;
    }

    function viewHasil()
{
    $data = $this->viewMatriksTernormalisasi();

    // Inisialisasi total normalisasiWP
    $totalNormalisasiWP = 0;
   

    foreach ($data as $row) {
        $row->normalisasiWP = pow($row->bobot_Status, -$row->bobot_kStatus) *
                              pow($row->bobot_Pendidikan, $row->bobot_kPendidikan) *
                              pow($row->bobot_LamaKerja, $row->bobot_kLamaKerja) *
                              pow($row->bobot_Kehadiran, $row->bobot_kKehadiran);

        // Menambahkan nilai normalisasiWP ke total
        $totalNormalisasiWP += $row->normalisasiWP;

        // Menyimpan nilai normalisasiWP pada properti hasil
        $row->hasil = $row->normalisasiWP;
    }

    // Memastikan totalNormalisasiWP tidak nol untuk menghindari pembagian oleh nol
    if ($totalNormalisasiWP != 0) {
        // Membagi setiap nilai normalisasiWP dengan totalNormalisasiWP
        foreach ($data as $row) {
            $row->hasil /= $totalNormalisasiWP;
            $row->totalNormalisasiWP = $totalNormalisasiWP;
        }

    }


    return $data;
}



}