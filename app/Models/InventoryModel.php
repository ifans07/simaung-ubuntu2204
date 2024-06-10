<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table            = 'tb_inventory';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_barang','harga','catatan','status','created_at','updated_at','slug','id_user'];

    protected bool $allowEmptyInserts = false;

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


    public function getBarangUser()
    {
        return $this->db->table($this->table)
        ->where('id_user', user_id())
        ->get()
        ->getResultArray();
    }

    public function getBarang($slug = false){
        
        if ($slug == false) {
            return $this->where('id_user', user_id())->findAll();
        }

        return $this->where(['slug' => $slug])->where('id_user', user_id())->first();

    }

    public function hapus($slug)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['slug' => $slug]);
    }
}
