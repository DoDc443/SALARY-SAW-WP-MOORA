<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'tb_karyawan';

    function __construct()
    {
        $this->db = db_connect();
    }

    function saveKaryawan($data)
    {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    // function getAllKaryawan()
    // {
    //     return $this->db->table($this->table)->get()->getResult();
    // }
    function getAllKaryawan()
    {
        $dataquery = $this->db->query('SELECT
        k.nip,
        k.nama,
        sk_status.keterangan AS keterangan_status,
        sk_pendidikan.keterangan AS keterangan_pendidikan,
        sk_lama_kerja.keterangan AS keterangan_lama_kerja,
        sk_kehadiran.keterangan AS keterangan_kehadiran
    FROM
        tb_karyawan k
    JOIN
        tb_subkriteria sk_status ON k.status = sk_status.id_subkriteria
    JOIN
        tb_subkriteria sk_pendidikan ON k.pendidikan = sk_pendidikan.id_subkriteria
    JOIN
        tb_subkriteria sk_lama_kerja ON k.lama_kerja = sk_lama_kerja.id_subkriteria
    JOIN
        tb_subkriteria sk_kehadiran ON k.kehadiran = sk_kehadiran.id_subkriteria;
    ');
        return $dataquery->getResult();
    }


    function getKaryawan($nip)
    {
        $dataquery = $this->db->query('SELECT
        k.nip,
        k.nama,
        k.status,
        k.pendidikan,
        k.lama_kerja,
        k.kehadiran,
        sk_status.keterangan AS keterangan_status,
        sk_pendidikan.keterangan AS keterangan_pendidikan,
        sk_lama_kerja.keterangan AS keterangan_lama_kerja,
        sk_kehadiran.keterangan AS keterangan_kehadiran
    FROM
        tb_karyawan k
    JOIN
        tb_subkriteria sk_status ON k.status = sk_status.id_subkriteria
    JOIN
        tb_subkriteria sk_pendidikan ON k.pendidikan = sk_pendidikan.id_subkriteria
    JOIN
        tb_subkriteria sk_lama_kerja ON k.lama_kerja = sk_lama_kerja.id_subkriteria
    JOIN
        tb_subkriteria sk_kehadiran ON k.kehadiran = sk_kehadiran.id_subkriteria 
    WHERE nip  = '. $nip
        
    );
        return $dataquery->getResult();
    }

    function updateKaryawan($table,$data,$where){
        $this->db->table($table)->update($data, $where);
        return true;
    }

    function deleteKaryawan($nip){
        $this->db->query("delete from tb_karyawan where nip = " . $nip);
        return true;
    }



    


}