<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNilaiPenyesuaian extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tbl_nilaipenyesuaian';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['id_penyesuaian', 'kode_akun3', 'debit', 'kredit', 'id_status'];

    // Dates
    protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    function ambilrelasiid($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_nilaipenyesuaian')
            ->where("id_penyesuaian=$id")
            ->join('akun3', 'akun3.kode_akun3 = tbl_nilaipenyesuaian.kode_akun3')
            ->join('tbl_status', 'tbl_status.id_status = tbl_nilaipenyesuaian.id_status');

        $query = $builder->get();
        return $query->getResultObject();
    }
}
