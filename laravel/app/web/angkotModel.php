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

    public function createAngkot($nama)
    {
        $insert = [
            'nama' => $nama
        ];
        $do = $this->db()->insert($insert);
        if($do)
        {
            return true;
        }
        return false;
    }

    public function updateAngkotRaw($id, array $update)
    {
        $do = $this->db()->where($id)->insert($update);
        if($do)
        {
            return true;
        }
        return false;
    }

    public function getAngkot()
    {
        return $this->db()->get();
    }
}
