<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function getPenyewa($id)
    {
        $cekOwner = $this->db->table('owner')->where('id_penyewa', $id)->get()->getRowArray();
        if ($cekOwner != null) {
            // dd($cekOwner);
            $cekFasilitas = $this->db->table('fasilitas')->where('id_owner', $cekOwner['id_owner'])->get()->getRowArray();
            if ($cekFasilitas != null) {
                // dd($cekFasilitas);
                if ($cekFasilitas['status'] ==  'Tervalidasi') {
                    return $cekFasilitas;
                }
            }
        }
        return null;
    }

    public function getAllFasilitasWithKategori($kategori)
    {
        return $this->db->table('fasilitas')
            // ->select('fasilitas.status as status_fasilitas, fasilitas.id_fasilitas, fasilitas.thumnail, fasilitas.nama_fasilitas, fasilitas.keterangan, owner.alamat, fasilitas.harga, fasilitas.hargaper')
            ->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori')
            ->join('owner', 'owner.id_owner = fasilitas.id_owner')
            ->where([
                'nama_kategori' => $kategori,
                'owner.status' => 'Verified',
                'fasilitas.status' => 'Tervalidasi'
            ])
            ->get()->getResultArray();
    }

    public function searchFasilitas($kategori, $kecamatan)
    {
        return $this->db->table('fasilitas')
            ->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori')
            ->join('owner', 'owner.id_owner = fasilitas.id_owner')
            ->like('alamat', $kecamatan)
            ->where([
                'nama_kategori' => $kategori,
                'fasilitas.status' => 'Tervalidasi'
            ])
            ->get()->getResultArray();
    }
}
