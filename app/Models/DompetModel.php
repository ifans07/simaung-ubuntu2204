<?php

namespace App\Models;

use CodeIgniter\Model;

class DompetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_dompet';
    protected $primaryKey       = 'id_dompet';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_dompet', 'saldo', 'saldo_awal', 'status', 'id_user'];

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


    public function getAllDompet($user_id)
    {
        if($user_id){
            return $this->db->table($this->table)
            // ->join('users','users.id=tb_dompet.id_user')
            ->where('tb_dompet.id_user', $user_id)
            ->get()
            ->getResultArray();
        }else{
            return $this->findAll();
        }
    }
}
