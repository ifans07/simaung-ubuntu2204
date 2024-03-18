<?php

namespace App\Models;

use CodeIgniter\Model;

class KebutuhanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_kebutuhan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kebutuhan', 'harga', 'created_at', 'tanggal_pakai', 'tanggal_habis', 'catatan', 'periode', 'status', 'id_dompet'];

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


    public function getAllKebutuhan()
    {
        return $this->db->table($this->table)
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_kebutuhan.id_dompet')
            ->get()
            ->getResultArray();
    }

    public function getLimitKebutuhan()
    {
        return $this->db->table($this->table)
            ->limit(5)
            ->get()->getResultArray();
    }
    public function countKebutuhanDone()
    {
        return $this->db->table($this->table)
            ->where('status', 0)
            ->get()->getNumRows();
    }
}
