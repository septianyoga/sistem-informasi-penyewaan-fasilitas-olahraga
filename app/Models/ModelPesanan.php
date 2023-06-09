<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesanan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id_pesanan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pesanan', 'id_penyewa', 'id_fasilitas', 'tanggal', 'nominal', 'bukti_pembayaran', 'metode_pembayaran', 'status_pesanan'];

    // Dates
    protected $useTimestamps = false;
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

    public function getJumlah($jenis)
    {
        return $this->where([
            'id_penyewa' => session()->get('id'),
            'status_pesanan'    => $jenis
        ])->countAllResults();
    }
}
