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
    protected $allowedFields    = ['id_pesanan', 'id_penyewa', 'id_fasilitas', 'tanggal', 'nominal', 'bukti_pembayaran', 'metode_pembayaran', 'date_expired', 'alasan_tolak', 'status_pesanan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_expired';
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

    public function getJumlahApprov()
    {
        return $this->where([
            'id_penyewa' => session()->get('id'),
            'status_pesanan'    => 'Diapprov',
            'tanggal >' => date('Y-m-d H:i:s')
        ])->countAllResults();
    }

    public function getJumlahBelumBayar()
    {
        return $this->where([
            'id_penyewa' => session()->get('id'),
            // 'tanggal >'  => date('Y-m-d H:i:s'),
            'status_pesanan' => 'Belum Dibayar',
            'date_expired >' => date('Y-m-d H:i:s')
        ])->countAllResults();
    }

    public function getJumlahBelumSelesai()
    {
        return $this->where([
            'id_penyewa' => session()->get('id'),
            'tanggal <'  => date('Y-m-d H:i:s'),
            'status_pesanan' => 'Belum Dibayar'
        ])->countAllResults();
    }

    public function getSelesai()
    {
        return $this
            ->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas', 'right')
            ->join('owner', 'owner.id_owner = fasilitas.id_owner')
            ->where([
                'pesanan.id_penyewa' => session()->get('id'),
                // 'tanggal <'   => date('Y-m-d H:i:s'),
                // 'status_pesanan' => 'Diapprov',
                // 'date_expired <' => date('Y-m-d H:i:s'),
                // 'status_pesanan' => 'Ditolak',
            ])->orderBy('id_pesanan', 'DESC')->findAll();
        // if ($data['date_expired'] < date('Y-m-d H:i:s')) {
        //     return 'lewat';
        // } else {
        //     return 'nggk';
        // }
    }
}
