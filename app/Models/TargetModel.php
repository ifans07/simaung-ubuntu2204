<?php

namespace App\Models;

use CodeIgniter\Model;

class TargetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_target';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['target', 'cost', 'tanggal_mulai', 'tanggal_selesai', 'created_at', 'status', 'catatan', 'id_dompet', 'id_user'];

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

    public function getAllTarget($user_id)
    {
        return $this->db->table($this->table)
            // ->join('tb_dompet', 'tb_dompet.id_dompet=tb_target.id_dompet')
            ->where('tb_target.id_user', $user_id)
            ->orderBy('tanggal_selesai', 'DESC')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getAllTargetDone($user_id){
        return $this->db->table($this->table)
            ->select('id, target, cost, tanggal_mulai, tanggal_selesai, tb_target.status, catatan, tb_target.id_dompet, tb_target.id_user, tb_dompet.nama_dompet')
            ->join('tb_dompet', 'tb_dompet.id_dompet=tb_target.id_dompet')
            ->where('tb_target.id_user', $user_id)
            ->orderBy('tanggal_selesai', 'DESC')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getLimitTarget($user_id)
    {
        return $this->db->table($this->table)
            ->where('id_user', $user_id)
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();
    }

    public function countTarget($user_id)
    {
        return $this->db->table($this->table)
            ->where('id_user', $user_id)
            ->where('status', 0)
            ->get()
            ->getNumRows();
    }
}
