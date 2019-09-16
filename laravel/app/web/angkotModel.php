<?php

namespace App\web;

use App\authModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class angkotModel extends Model
{
    private function db()
    {
        return DB::table('data_angkot');
    }

    private function db_jurusan()
    {
        return DB::table('data_jurusan');
    }

    private function authModel()
    {
        return new authModel();
    }

    private function profilModel()
    {
        return new profilModel();
    }

    public function createJurusan($awal_jurusan, $tujuan_jurusan, $rute)
    {
        $insert = [
            'awal_jurusan' => $awal_jurusan,
            'tujuan_jurusan' => $tujuan_jurusan,
            'rute' => json_encode($rute)
        ];
        $do = $this->db_jurusan()->insert($insert);
        if ($do) {
            return true;
        }
        return false;
    }

    public function updateJurusan($id, $awal_jurusan, $tujuan_jurusan, $rute)
    {
        $update = [
            'awal_jurusan' => $awal_jurusan,
            'tujuan_jurusan' => $tujuan_jurusan,
            'rute' => json_encode($rute)
        ];
        $do = $this->db_jurusan()->where('id', $id)->update($update);
        if ($do) {
            return true;
        }
        return false;
    }

    public function getJurusan($id = null)
    {
        if ($id !== null) {
            return $this->db_jurusan()->where('id', $id)->get();
        }
        return $this->db_jurusan()->get();
    }

    public function updateJurusanAngkot($id_angkot, $id_jurusan)
    {
        $do = $this->db()->where('id', $id_angkot)->update(['id_juruan', $id_jurusan]);
        if ($do) {
            return true;
        }
        return false;
    }

    public function createAngkot($nama)
    {
        $insert = [
            'nama_angkot' => $nama
        ];
        $do = $this->db()->insert($insert);
        $id = $this->db()->where('nama_angkot', $nama)->get()->pluck('id')[0];
        if ($do) {
            return $id;
        }
        return false;
    }

    public function deleteAngkot($id)
    {
        $where = [
            'id' => $id
        ];
        $do = $this->db()->where($where)->delete();
        if ($do) {
            return true;
        }
        return false;
    }

    public function deleteJurusan($id)
    {
        $where = [
            'id' => $id
        ];
        $do = $this->db_jurusan()->where($where)->delete();
        if ($do) {
            return true;
        }
        return false;
    }

    public function updateAngkotRaw($id, array $update)
    {
        $do = $this->db()->where('id', $id)->update($update);
        if ($do) {
            return true;
        }
        return false;
    }

    public function getAngkot($id = null)
    {
        if ($id !== null) {
            return $this->db()->where('id', $id)->get();
        }
        return $this->db()->get();
    }

    public function getAngkotOfSupir($supir)
    {
        return $this->db()->where('supir', $supir)->get();
    }

    public function getSupirProfil($id)
    {
        $supir = $this->db()->where('id', $id)->get()->pluck('supir')[0];
        $get = $this->profilModel()->get($supir);
        if ($get) {
            return $get;
        }
        return false;
    }

    public function getJurusanData($id)
    {
        $id_jurusan = $this->db()->where('id', $id)->get()->pluck('id_jurusan')[0];
        $get = $this->getJurusan($id_jurusan);
        if ($get) {
            return $get;
        }
        return false;
    }

    public function getAngkotPaged($jumlah = 8)
    {
        return $this->db()->paginate($jumlah);
    }

    public function getAngkotPagedJurusan($jurusan, $jumlah = 8)
    {
        return $this->db()->where('id_jurusan', $jurusan)->paginate($jumlah);
    }
}
