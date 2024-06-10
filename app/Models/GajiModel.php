<?php

namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_gaji';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['gaji','tanggal_gajian', 'id_user','slug', 'iddompet'];

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

    public function getGajiUser($iduser){
        return $this->db->table($this->table)
        ->select('gaji, tanggal_gajian, tb_gaji.slug, tb_gaji.id_user, tb_gaji.iddompet, tb_dompet.nama_dompet, tb_gaji.id, tb_dompet.saldo')
        ->join('tb_dompet', 'tb_dompet.id_dompet=tb_gaji.iddompet')
        ->where('tb_gaji.id_user', $iduser)
        ->get()
        ->getResultArray();
    }

    public function getFindGaji($slug = false)
    {
        if($slug == false)
        {
            return $this->where('id_user', user_id())->findAll();
        }

        return $this->where([
            'slug' => $slug,
            'id_user' => user_id()
        ])->first();
    }

    public function hapus($slug)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['slug' => $slug]);
    }
}
