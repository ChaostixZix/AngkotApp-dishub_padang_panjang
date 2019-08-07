<?php

namespace App\web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class profilModel extends Model
{
    private function db()
    {
        return DB::table('data_profil');
    }

    public function cek($username)
    {
        $get = $this->db()->where('username', $username)->get();
        if(count($get) > 0)
        {
            return true;
        }
        return false;
    }

    public function buat($username)
    {
        if(!$this->cek($username))
        {
            $insert = [
                'username' => $username
            ];
            $do = $this->db()->insert($insert);
            if($do)
            {
                return true;
            }
        }
        return false;
    }

    public function updateProfil($username, array $data)
    {
        $do = $this->db()->where('username', $username)->update($data);
        if($do)
        {
            return true;
        }
        return false;
    }

    public function resetProfil($username)
    {
        $do = $this->db()->where('username', $username)->delete();
        if($do)
        {
            return true;
        }
        return false;
    }
}
