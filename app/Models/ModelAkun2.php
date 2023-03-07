<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAkun2 extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'akun2';
    protected $primaryKey       = 'id_akun2';
    protected $returnType       = 'object';
    protected $allowedFields    = ['kode_akun2', 'nama_akun2', 'kode_akun1'];
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;

    // Dates
    // protected $useTimestamps = false;
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

    function ambilrelasi()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('akun2');
        $builder->join('akun1', 'akun1.kode_akun1 = akun2.kode_akun1');
        $query = $builder->get();
        return $query->getResult();
    }
}
