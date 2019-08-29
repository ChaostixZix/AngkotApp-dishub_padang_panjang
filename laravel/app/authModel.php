<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class authModel extends Model
{
    public function db()
    {
        return DB::table('data_user');
    }

    public function updateRaw($username, array $update)
    {
        if($this->cekUser($username))
        {
            $do = $this->db()->where('username', $username)->update($update);
            if($do)
            {
                return true;
            }
        }
        return false;
    }

    public function cekUser($username)
    {
        $get = $this->db()->where('username', $username)->get();
        if(count($get) > 0)
        {
            return true;
        }
        return false;
    }

    public function login($username, $password)
    {
        $where = [
            'username' => $username,
            'password' => $password
        ];
        $get = $this->db()->where($where)->get();
        if(count($get) > 0)
        {
            return $get->pluck('level')[0];
        }
        return false;
    }

    public function registerRaw(array $data_insert)
    {
        if(!$this->cekUser($data_insert['username']))
        {
            $do = $this->db()->insert($data_insert);
            if($do)
            {
                return true;
            }
        }
        return false;
    }

    public function register($username, $password, $level)
    {
        if(!$this->cekUser($username))
        {
            $insert = [
                'username' => $username,
                'password' => $password,
                'level' => $level
            ];

            $do = $this->db()->insert($insert);
            if($do)
            {
                return true;
            }
        }
        return false;
    }
}
