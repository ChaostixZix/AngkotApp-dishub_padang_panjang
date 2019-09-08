<?php

namespace App\web;

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
        if($id !== null)
        {
            return $this->db_jurusan()->where('id', $id)->get();
        }
        return $this->db_jurusan()->get();
    }

    public function updateJurusanAngkot($id_angkot, $id_jurusan)
    {
        $do = $this->db()->where('id', $id_angkot)->update(['id_juruan', $id_jurusan]);
        if($do)
        {
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
        if($do)
        {
            return true;
        }
        return false;
    }

    public function deleteAngkot($id)
    {
        $where = [
            'id' => $id
        ];
        $do = $this->db()->where($where)->delete();
        if($do)
        {
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
        if($do)
        {
            return true;
        }
        return false;
    }

    public function updateAngkotRaw($id, array $update)
    {
        $do = $this->db()->where('id', $id)->update($update);
        if($do)
        {
            return true;
        }
        return false;
    }

    public function getAngkot($id = null)
    {
        if($id !== null)
        {
            return $this->db()->where('id', $id)->get();
        }
        return $this->db()->get();
    }
}
