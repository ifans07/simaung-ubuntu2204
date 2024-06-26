<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatgajiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_riwayatgaji';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_gaji', 'tanggal', 'status', 'slug', 'id_user'];

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

    public function getRiwayatGajiBulan($bulan)
    {
        $builder = $this->db->table($this->table);
        return $this->where('id_user', user_id())->like(['tanggal' => $bulan])->first();
    }

    public function getRiwayatGajiUser()
    {
        $builder = $this->db->table($this->table);
        $builder->join('tb_gaji', 'tb_gaji.id=tb_riwayatgaji.id_gaji');
        $builder->join('tb_dompet', 'tb_gaji.iddompet=tb_dompet.id_dompet');
        return $builder->where('tb_riwayatgaji.id_user', user_id())
        ->get()
        ->getResultArray();
    }
}
