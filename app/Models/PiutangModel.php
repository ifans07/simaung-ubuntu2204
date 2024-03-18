<?php

namespace App\Models;

use CodeIgniter\Model;

class PiutangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_piutang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_peminjam', 'nominal', 'tanggal_pinjam', 'catatan', 'id_dompet', 'status'];

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

    public function getPiutang($slug = false)
    {
        if ($slug == false) {
            return $this->join('tb_dompet', 'tb_dompet.id_dompet=tb_piutang.id_dompet')->orderBy('tanggal_pinjam', 'DESC')->findAll();
        }

        return $this->join('tb_dompet', 'tb_dompet.id_dompet=tb_piutang.id_dompet')->where(['id' => $slug])->first();
    }
    
    public function getOrangUtang($id){
        return $this->db->table($this->table)
        ->where('id', $id)
        ->get()
        ->getResultArray();
    }

    public function getIdDompet($id)
    {
        return $this->db->table($this->table)
        ->select('tb_piutang.id_dompet, nama_dompet, nama_peminjam, tanggal_pinjam, tb_piutang.catatan, tb_dompet.saldo')
        ->selectSum('nominal')
        ->join('tb_dompet', 'tb_dompet.id_dompet=tb_piutang.id_dompet')
        ->where('tb_piutang.id_dompet', $id)
        ->get()
        ->getResultArray();
    }
}