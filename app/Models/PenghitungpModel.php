<?php

namespace App\Models;

use CodeIgniter\Model;

class PenghitungpModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_penghitungperiode';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_aktivitas', 'catatan', 'tanggal_mulai', 'tanggal_selesai', 'status_penghitung', 'id_user'];

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


    public function getAllPenghitungUser($user_id)
    {
        return $this->db->table($this->table)
        ->where('id_user', $user_id)
        ->orderBy('id', 'DESC')
        ->get()
        ->getResultArray();
    }
}
