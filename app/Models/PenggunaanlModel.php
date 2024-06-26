<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaanlModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_lamapenggunaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_barang', 'catatan', 'tanggal_mulai', 'tanggal_selesai', 'status_penggunaan', 'id_user'];

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

    public function getAllPenggunaanUser($user_id)
    {
        return $this->db->table($this->table)
        ->where('id_user', $user_id)
        ->orderBy('id', 'DESC')
        ->get()
        ->getResultArray();
    }
}
