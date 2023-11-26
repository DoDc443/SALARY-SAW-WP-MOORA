<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table = 'tb_kriteria';

    function __construct()
    {
        $this->db = db_connect();
    }

    function saveKriteria($data)
    {
        $this->db->table($this->table)->insert($data);
        return true;
    }

    function getKriteriaStatus()
    {
        $dataquery = $this->db->query('SELECT a.kriteria, b.keterangan,b.id_subkriteria FROM tb_kriteria a JOIN tb_subkriteria b ON a.id_kriteria = b.id_kriteria WHERE a.kriteria ="Status"; ');
        return $dataquery->getResult();
    }

    function getKriteriaPendidikan()
    {
        $dataquery = $this->db->query('SELECT a.kriteria, b.keterangan,b.id_subkriteria FROM tb_kriteria a JOIN tb_subkriteria b ON a.id_kriteria = b.id_kriteria WHERE a.kriteria ="Pendidikan"; ');
        return $dataquery->getResult();
    }

    function getKriteriaLamaKerja()
    {
        $dataquery = $this->db->query('SELECT a.kriteria, b.keterangan,b.id_subkriteria FROM tb_kriteria a JOIN tb_subkriteria b ON a.id_kriteria = b.id_kriteria WHERE a.kriteria ="LamaKerja"; ');
        return $dataquery->getResult();
    }

    function getKriteriaKehadiran()
    {
        $dataquery = $this->db->query('SELECT a.kriteria, b.keterangan,b.id_subkriteria FROM tb_kriteria a JOIN tb_subkriteria b ON a.id_kriteria = b.id_kriteria WHERE a.kriteria ="Kehadiran"; ');
        return $dataquery->getResult();
    }

    


}