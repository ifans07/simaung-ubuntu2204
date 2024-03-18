<?php

namespace App\Models;

use CodeIgniter\Model;

class LogaktivitasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_logaktivitas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['log_aktivitas', 'jumlah', 'tanggal', 'catatan', 'created_at', 'status', 'id_dompet', 'ke_iddompet', 'biaya_tf'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function orderLog()
    {
        return $this->db->table($this->table)
            ->orderBy('tanggal', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getAllLog()
    {
        return $this->db->table($this->table)
            ->select('id, tb_logaktivitas.log_aktivitas,jumlah,tanggal,catatan, tb_logaktivitas.status, tb_logaktivitas.id_dompet, nama_dompet, saldo, saldo_awal')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->orderBy('tanggal', 'DESC')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    // public function getLogBulan(){

    // }

    public function getSumAll()
    {
        return $this->db->table($this->table)
            ->select('tb_dompet.nama_dompet, tb_logaktivitas.ke_iddompet')
            ->selectSum('jumlah')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->groupBy('tb_logaktivitas.id_dompet')
            ->get()
            ->getResultArray();
    }

    public function logKeluar($id)
    {
        return $this->db->table($this->table)
            ->select('id, tb_logaktivitas.log_aktivitas,jumlah,tanggal,catatan, tb_logaktivitas.status, tb_logaktivitas.id_dompet, nama_dompet, saldo, saldo_awal')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->where('tb_logaktivitas.id_dompet', $id)
            ->orderBy('tanggal', 'DESC')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    // count
    public function countLogKeluar($id)
    {
        return $this->db->table($this->table)
            ->where('id_dompet', $id)
            ->where('status', 0)
            ->get()
            ->getNumRows();
    }
    public function countLogTarget($id)
    {
        return $this->db->table($this->table)
            ->where('id_dompet', $id)
            ->where('status', 3)
            ->get()
            ->getNumRows();
    }
    public function countLogKebutuhan($id)
    {
        return $this->db->table($this->table)
            ->where('id_dompet', $id)
            ->where('status', 4)
            ->get()
            ->getNumRows();
    }

    // periode/ atur tanggal
    public function getLogBulanIni()
    {
        return $this->db->table($this->table)
            ->select('id, tb_logaktivitas.log_aktivitas,jumlah,tanggal,catatan, tb_logaktivitas.status, tb_logaktivitas.id_dompet, nama_dompet, saldo, saldo_awal, ke_iddompet')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->where('tanggal >=', date('Y-m-01'))
            ->where('tanggal <=', date('Y-m-31'))
            ->get()
            ->getResultArray();
    }

    public function getLogHariIni()
    {
        return $this->db->table($this->table)
            ->select('id, tb_logaktivitas.log_aktivitas,jumlah,tanggal,catatan, tb_logaktivitas.status, tb_logaktivitas.id_dompet, nama_dompet, saldo, saldo_awal, ke_iddompet')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->where('tanggal', date('Y-m-d'))
            ->get()
            ->getResultArray();
    }


    // coba
    public function getLogBulan()
    {
        return $this->db->table($this->table)
            ->select('id, tb_logaktivitas.log_aktivitas,jumlah,tanggal,catatan, tb_logaktivitas.status, tb_logaktivitas.id_dompet, nama_dompet, saldo, saldo_awal, ke_iddompet')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->where('tanggal >=', date('Y-m-01'))
            ->where('tanggal <=', date('Y-m-31'))
            ->orderBy('tanggal', 'DESC')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function getJmlTrxBlnIni()
    {
        return $this->db->table($this->table)
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->where('tanggal >=', date('Y-m-01'))
            ->where('tanggal <=', date('Y-m-31'))
            ->get()
            ->getNumRows();
    }

    public function getJmlTrf()
    {
        return $this->db->table($this->table)
            ->select('id, tb_logaktivitas.log_aktivitas,jumlah,tanggal,catatan, tb_logaktivitas.status, tb_logaktivitas.id_dompet, nama_dompet, saldo, saldo_awal')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->where('tb_logaktivitas.status', 2)
            ->get()
            ->getResultArray();
    }

    public function filterData($tanggal1 = 'Y-m-01', $tanggal2 = 'Y-m-31')
    {
        return $this->db->table($this->table)
            ->select('id, tb_logaktivitas.log_aktivitas,jumlah,tanggal,catatan, tb_logaktivitas.status, tb_logaktivitas.id_dompet, nama_dompet, saldo, saldo_awal, ke_iddompet')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_logaktivitas.id_dompet')
            ->where('tanggal >=', date($tanggal1))
            ->where('tanggal <=', date($tanggal2))
            ->orderBy('tanggal', 'DESC')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

}
