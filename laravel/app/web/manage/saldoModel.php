<?php

namespace App\web\manage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class saldoModel extends Model
{
    public function db()
    {
        return DB::table('data_user');
    }

    public function cekAvailibility($username, $saldo_cek)
    {
        if($this->cekSaldo($username) > $saldo_cek)
        {
            return true;
        }
        return false;
    }

    public function cekSaldo($username)
    {
        $get = $this->db()->where('username', $username)->get()->pluck('saldo')[0];
        if($get)
        {
            return $get;
        }
        return false;
    }

    public function kurangi($username, $saldo_kurangi)
    {
        $update = [
            'saldo' => $this->cekSaldo($username) - $saldo_kurangi
        ];
        $do = $this->db()->where('username', $username)->update($update);
        if($do)
        {
            return true;
        }
        return false;
    }

    public function tambah($username, $saldo_tambah)
    {
        $update = [
            'saldo' => $this->cekSaldo($username) + $saldo_tambah
        ];
        $do = $this->db()->where('username', $username)->update($update);
        if($do)
        {
            return true;
        }
        return false;
    }
}
