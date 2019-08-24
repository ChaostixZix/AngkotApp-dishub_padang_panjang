<?php

namespace App\web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class aduanModel extends Model
{
    private function db()
    {
        return DB::table('pengaduan');
    }

    public function newAduan($judul, $tindakan, $aduan, $pengadu, $gambar, $created_at)
    {
        $insert = [
            'judul' => $judul,
            'tindakan' => $tindakan,
            'aduan' => $aduan,
            'pengadu' => $pengadu,
            'gambar' => $gambar,
            'tanggal_pengaduan' => $created_at
        ];
        $this->db()->insert($insert);
        return true;
    }

    public function deleteAduan($id)
    {
        $this->db()->where('id', $id)->delete();
        return true;
    }

    public function updateAduan($id, $tindakan, $judul, $aduan, $gambar)
    {
        $update = [
            'judul' => $judul,
            'tindakan' => $tindakan,
            'aduan' => $aduan,
        ];
        if($gambar !== null)
        {
            $update['gambar'] = $gambar;
        }
        $this->db()->where('id', $id)->update($update);
        return true;
    }

    public function changeStatus($id, $status)
    {
        $update = [
            'status' => $status
        ];
        $this->db()->where('id', $id)->update($update);
        return true;
    }

    public function getAduan($id = null)
    {
        if ($id !== null) {
            $get = $this->db()->where('id', $id)->get();
            return $get;
        }
        $get = $this->db()->orderBy('tanggal_pengaduan', 'ASC')->get();
        return $get;
    }

    public function getAduanByPengadu($pengadu)
    {
        $get = $this->db()->where('pengadu', $pengadu)->orderBy('tanggal_pengaduan', 'ASC')->get();
        return $get;
    }

    public function getAduanForView()
    {
        $get = $this->getAduan();
        $data = [];

        $i = 0;
        $a = 0;
        foreach ($get as $aduan) {
            $data[$a][] = $aduan;
            $i++;
            if($i == 6)
            {
                $a++;
                $i = 0;
            }
        }

        return $data;
    }

    public function getAduanForViewByPengadu($pengadu)
    {
        $get = $this->getAduanByPengadu($pengadu);
        $data = [];

        $i = 0;
        $a = 0;
        foreach ($get as $aduan) {
            $data[$a][] = $aduan;
            $i++;
            if($i == 6)
            {
                $a++;
                $i = 0;
            }
        }

        return $data;
    }
}
