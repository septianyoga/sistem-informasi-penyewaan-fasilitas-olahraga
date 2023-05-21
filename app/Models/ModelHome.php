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
}
