<?php

namespace App\web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class parkirModel extends Model
{
    public function db()
    {
        return DB::table('data_pesanan_parkir');
    }

    public function db_tempat_parkir()
    {
        return DB::table('tempat_parkir');
    }

    public function getHarga($id_tempat_parkir, $jenis_kendaraan)
    {
        if($jenis_kendaraan == 'Mobil')
        {
            return $this->db_tempat_parkir()->where('id', $id_tempat_parkir)->get()->pluck('harga_mobil')[0];
        }else{
            return $this->db_tempat_parkir()->where('id', $id_tempat_parkir)->get()->pluck('harga_motor')[0];
        }
    }

    public function getTempatParkirAvailableToday($date)
    {
        $cek = $this->db_tempat_parkir()->get();
        $data = [];
        $jumlah_kapasitas_all = 0;
        foreach ($cek as $c) {
            $pemesan = $this->getPesananByDate($c->id, $date);
            $c->kapasitas_left = $c->kapasitas - $pemesan;
            $jumlah_kapasitas_all = $jumlah_kapasitas_all + $c->kapasitas_left;
            $data[0][] = $c;
        }
        $data['jumlah_kapasitas_all'] = $jumlah_kapasitas_all;
        return $data;
    }

    public function getPesananByDate($id_tempat_parkir, $date)
    {
        $where = [
            'tempat_parkir' => $id_tempat_parkir,
            'tanggal' => $date
        ];
        return count($this->db()->where($where)->get());
    }

    public function cekAvailibility($id_tempat_parkir, $date)
    {
        $where = [
            'tempat_parkir' => $id_tempat_parkir,
            'tanggal' => $date
        ];
        $get_pemesan = $this->db()->where($where)->get();
        $get_kapasitas = $this->db_tempat_parkir()->where('id', $id_tempat_parkir)->get()->pluck('kapasitas')[0];

        if ($get_pemesan < $get_kapasitas) {
            return true;
        }
        return false;
    }

    public function pesanParkirRaw(array $insert)
    {
        $do = $this->db()->insert($insert);
        if ($do) {
            return $this->db()->where($insert)->get()->pluck('id')[0];
        }
        return false;
    }

    public function getPesanan($id = null)
    {
        if ($id !== null) {
            $get = $this->db()->where('id', $id)->get();
            if (count($get) > 0) {
                return $get;
            }
            return false;
        }
        $get = $this->db()->get();
        if (count($get) > 0) {
            return $get;
        }
        return false;
    }

    public function changeStatus($id, $status)
    {
        $do = $this->db()->where('id', $id)->update(['status' => $status]);
        if($do)
        {
            return true;
        }
        return false;
    }
}
