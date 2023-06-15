<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{

    public function getAllOwner()
    {
        return $this->db->table('owner')
            ->join('penyewa', 'penyewa.id_penyewa = owner.id_penyewa', 'left')
            ->where('role', 'Owner')
            ->get()->getResultArray();
    }

    public function getAllPenyewa()
    {
        return $this->db->table('penyewa')
            // ->where('role', 'Penyewa')
            ->get()->getResultArray();
    }

    public function verif($data)
    {
        $this->db->table('owner')->where('id_owner', $data['id_owner'])->update($data);
    }

    public function getAllFasilitas()
    {
        return $this->db->table('fasilitas')
            ->get()->getResultArray();
    }

    public function getAllFasilitasJoin()
    {
        return $this->db->table('fasilitas')
            ->join('owner', 'owner.id_owner = fasilitas.id_owner', 'left')
            ->where([
                'owner.status' => 'Verified',
                'fasilitas.status' => 'Belum Tervalidasi'
            ])
            ->get()->getResultArray();
    }

    public function getAllFasilitasVerified()
    {
        return $this->db->table('fasilitas')
            ->select('fasilitas.id_fasilitas as id_fasilitas, fasilitas.nama_fasilitas as nama_fasilitas, fasilitas.harga as harga_fasilitas, fasilitas.hargaper, fasilitas.status as status_fasilitas')
            ->join('owner', 'owner.id_owner = fasilitas.id_owner', 'left')
            ->where([
                'owner.status' => 'Verified',
                'fasilitas.status !=' => 'Belum Tervalidasi'
            ])
            ->get()->getResultArray();
    }

    public function getFasilitasById($id_fasilitas)
    {
        return $this->db->table('fasilitas')
            ->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori', 'left')
            ->join('owner', 'owner.id_owner = fasilitas.id_owner', 'left')
            ->where('id_fasilitas', $id_fasilitas)->get()->getRowArray();
    }

    public function getFoto($id_fasilitas)
    {
        return $this->db->table('foto')->where('id_fasilitas', $id_fasilitas)->get()->getResultArray();
    }

    public function getPenyewaByIdFasilitas($id_fasilitas)
    {
        $owner = $this->getFasilitasById($id_fasilitas);
        return $this->db->table('penyewa')->where('id_penyewa', $owner['id_penyewa'])->get()->getRowArray();
    }

    public function ubahStatusFasilitas($data)
    {
        $this->db->table('fasilitas')->where('id_fasilitas', $data['id_fasilitas'])->update($data);
    }

    public function getOwner($id_owner)
    {
        return $this->db->table('owner')->where('id_owner', $id_owner)->get()->getRowArray();
    }

    public function ubahStatus($data)
    {
        $this->db->table('penyewa')->where('id_penyewa', $data['id_penyewa'])->update($data);
    }

    public function delOwner($data)
    {
        $this->db->table('owner')->where('id_owner', $data['id_owner'])->delete($data);
    }

    public function getFotoByIdOwner($id_owner)
    {
        $fasilitas = $this->db->table('fasilitas')->where('id_owner', $id_owner)->get()->getRowArray();
        if ($fasilitas) {
            return $this->db->table('foto')->where('id_fasilitas', $fasilitas['id_fasilitas'])->get()->getResultArray();
        }
        return null;
    }
}
