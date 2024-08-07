<?php

namespace App\Models;

use CodeIgniter\Model;

class CicilanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_cicilanpiutang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_piutang', 'id_dompet', 'catatan_cicilan', 'jml_cicilan', 'tanggal', 'status_cicilan', 'id_user'];

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


    public function getCicilan($id){
        return $this->db->table($this->table)
        ->join('tb_piutang', 'tb_piutang.id=tb_cicilanpiutang.id_piutang')
        ->join('tb_dompet', 'tb_dompet.id_dompet=tb_cicilanpiutang.id_dompet')
        ->where('tb_piutang.id', $id)
        ->orderBy('tanggal', 'DESC')
        ->get()
        ->getResultArray();
    }

    public function getCicilanSum(){
        return $this->db->table($this->table)
        ->select('id,id_piutang,id_dompet,id_user,tanggal,status_cicilan,created_at,updated_at')
        ->selectSum('jml_cicilan')
        ->where('id_user', user_id())
        ->groupBy('id_piutang')
        ->groupBy('status_cicilan')
        ->get()
        ->getResultArray();
    }

    public function getCicilanUser($user_id)
    {
        return $this->db->table($this->table)
        ->where('id_user', $user_id)
        ->get()
        ->getResultArray();
    }

    public function getIdDompet($id)
    {
        return $this->db->table($this->table)
        ->join('tb_piutang', 'tb_piutang.id=tb_cicilanpiutang.id_piutang')
        ->join('tb_dompet', 'tb_dompet.id_dompet=tb_cicilanpiutang.id_dompet')
        ->where('tb_cicilanpiutang.id_dompet', $id)
        ->orderBy('tanggal', 'DESC')
        ->get()
        ->getResultArray();
    }
}