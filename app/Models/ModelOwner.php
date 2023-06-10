<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelOwner extends Model
{

    public function updateToOwner($data)
    {
        return $this->db->table('penyewa')->where('id_penyewa', $data['id_penyewa'])->update($data);
    }

    public function insertToOwner($data)
    {
        $this->db->table('owner')->insert($data);
    }

    public function getAllFasilitas($id)
    {
        $cekOwner = $this->db->table('owner')->where('id_penyewa', $id)->get()->getRowArray();
        if ($cekOwner != null) {
            return $this->db->table('fasilitas')
                ->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori', 'left')
                ->where('id_owner', $cekOwner['id_owner'])->get()->getResultArray();
        }
        return null;
    }

    public function getKategori()
    {
        return $this->db->table('kategori')->get()->getResultArray();
    }

    public function getAllFoto($id_fasilitas)
    {
        return $this->db->table('foto')->where('id_fasilitas', $id_fasilitas)->get()->getResultArray();
    }

    public function deleteFoto($id_foto)
    {
        $this->db->table('foto')->where('id_foto', $id_foto)->delete(['id_foto' => $id_foto]);
    }

    public function delFasilitas($data)
    {
        $this->db->table('fasilitas')->where('id_fasilitas', $data['id_fasilitas'])->delete($data);
    }

    public function getFasilitasById($id)
    {
        return $this->db->table('fasilitas')->where('id_fasilitas', $id)->get()->getRowArray();
    }

    public function updateFasilitas($data)
    {
        $this->db->table('fasilitas')->where('id_fasilitas', $data['id_fasilitas'])->update($data);
    }

    public function getOwner()
    {
        return $this->db->table('owner')->where('id_penyewa', session()->get('id'))->get()->getRowArray();
    }
}
