<?php

namespace App\web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class aduanModel extends Model
{
    private function db()
    {
        return DB::table('aduan');
    }

    public function newAduan($judul, $jenis_aduan, $aduan, $pengadu, $created_at)
    {
        $insert = [
            'judul' => $judul,
            'jenis_aduan' => $jenis_aduan,
            'konten' => $aduan,
            'pengadu' => $pengadu,
            'created_at' => $created_at
        ];
        $this->db()->insert($insert);
        return true;
    }

    public function deleteAduan($id)
    {
        $this->db()->where('id', $id)->delete();
        return true;
    }

    public function updateAduan($id, $jenis_aduan, $judul, $aduan, $updated_at)
    {
        $update = [
            'judul' => $judul,
            'jenis_aduan' => $jenis_aduan,
            'konten' => $aduan,
            'updated_at' => $updated_at
        ];
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
        if($id !== null)
        {
            $get = $this->db()->where('id', $id)->get();
            return $get;
        }
        $get = $this->db()->orderBy('created_at', 'desc')->get();
        return $get;
    }
}
