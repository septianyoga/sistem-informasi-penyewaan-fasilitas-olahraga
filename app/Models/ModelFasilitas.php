<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFasilitas extends Model
{

    public function cekRolePenyewa($id)
    {
        return $this->db->table('penyewa')
            ->where('id_penyewa', $id)
            ->get()->getRowArray();
    }

    public function getOwner($id_penyewa)
    {
        return $this->db->table('owner')->where('id_penyewa', $id_penyewa)->get()->getRowArray();
    }

    public function getKategori()
    {
        return $this->db->table('kategori')->get()->getResultArray();
    }

    public function insertFasilitas($data)
    {
        $this->db->table('fasilitas')->insert($data);
    }

    public function insertFoto($data)
    {
        $this->db->table('foto')->insert($data);
    }

    public function getLastId()
    {
        $query = $this->db->table('fasilitas')->orderBy('id_fasilitas', "DESC")->limit(1)->get()->getRowArray();
        if ($query) {
            return $query['id_fasilitas'] + 1;
        } else {
            return 1;
        }
    }

    public function getFasilitas($id_owner)
    {
        return $this->db->table('fasilitas')->where('id_owner', $id_owner)
            ->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori', 'left')
            ->get()->getRowArray();
    }

    public function getFoto($id_fasilitas)
    {
        return $this->db->table('foto')->where('id_fasilitas', $id_fasilitas)->get()->getResultArray();
    }

    public function updateFotoFasilitas($data)
    {
        $this->db->table('fasilitas')->where('id_fasilitas', $data['id_fasilitas'])->update($data);
    }

    public function getFasilitasById($id_fasilitas)
    {
        return $this->db->table('fasilitas')
            ->join('kategori', 'kategori.id_kategori = fasilitas.id_kategori')
            ->join('owner', 'owner.id_owner = fasilitas.id_owner')
            ->join('penyewa', 'penyewa.id_penyewa = owner.id_penyewa')
            ->where('id_fasilitas', $id_fasilitas)->get()->getRowArray();
    }

    public function totalFasilitas()
    {
        $owner = $this->db->table('owner')->where('id_penyewa', session()->get('id'))->get()->getRowArray();
        return $this->db->table('fasilitas')->where('id_owner', $owner['id_owner'])->countAllResults();
    }

    public function nonAktifFasilitas($data)
    {
        $this->db->table('fasilitas')->where('id_fasilitas', $data['id_fasilitas'])->update($data);
    }

    public function viewer($id_fasilitas)
    {
        $fasilitas = $this->db->table('fasilitas')->where('id_fasilitas', $id_fasilitas)->get()->getRowArray();
        $tambah = $fasilitas['viewer'] + 1;
        $this->db->table('fasilitas')->where('id_fasilitas', $id_fasilitas)->update(['viewer' => $tambah]);
    }

    public function totalAllView()
    {
        $owner = $this->db->table('owner')->where('id_penyewa', session()->get('id'))->get()->getRowArray();
        return $this->db->table('fasilitas')->selectSum('viewer')->where('id_owner', $owner['id_owner'])->get()->getRowArray();
    }

    public function totalPesanan()
    {
        $owner = $this->db->table('owner')->where('id_penyewa', session()->get('id'))->get()->getRowArray();
        return $this->db->table('pesanan')
            ->join('fasilitas', 'fasilitas.id_fasilitas = pesanan.id_fasilitas', 'right')
            // ->join('owner', 'owner.id_owner = fasilitas.id_owner')
            // ->where('fasilitas.id_owner', $owner['id_owner'])->get()->getResultArray();
            ->where('fasilitas.id_owner', $owner['id_owner'])->get()->getResultArray();
    }
}
