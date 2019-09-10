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

    public function deleteTiket()
    {
        date_default_timezone_set('Asia/Jakarta');
        $minuts = date('h:i', time() - 10 * 60);
        var_dump($minuts);
        $find = $this->db()->where('waktu', $minuts)->delete();
        if($find)
        {
            return true;
        }
        return false;
    }

    public function getHarga($id_tempat_parkir, $jenis_kendaraan)
    {
        if ($jenis_kendaraan == 'Mobil') {
            return $this->db_tempat_parkir()->where('id', $id_tempat_parkir)->get()->pluck('harga_mobil')[0];
        } else {
            return $this->db_tempat_parkir()->where('id', $id_tempat_parkir)->get()->pluck('harga_motor')[0];
        }
    }

    public function getJarak($origins, $destinations)
    {
        $origins = str_replace(" ", "+", $origins);
        $destinations = str_replace(" ", "+", $destinations);
        $key = "AIzaSyAa0UwQAFnGd9eGwP2UDY4mWWVXXMrTb0Q";
        $data = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $origins .
            "&destinations=" . $destinations . "&key=" . $key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $jarakKm = $data['rows'][0]['elements'][0]['distance']['value'] / 1000;
        return $jarakKm;
    }

    public function getTempatParkirAvailableToday($date)
    {
        $cek = $this->db_tempat_parkir()->get();
        $data = [];
        $jumlah_kapasitas_all = 0;
        foreach ($cek as $c) {
            $pemesan = $this->getJumlahPesananByDate($c->id, $date);
            $c->kapasitas_left = $c->kapasitas - $pemesan;
            $jumlah_kapasitas_all = $jumlah_kapasitas_all + $c->kapasitas_left;
            $data[0][] = $c;
        }
        $data['jumlah_kapasitas_all'] = $jumlah_kapasitas_all;
        return $data;
    }

    public function getJumlahPesananByDate($id_tempat_parkir, $date)
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
        $get = $this->getPesananByDate($insert['tanggal']);
        if ($get == false) {
            $nomor = 1;
        }else{
            $nomor = count($get) + 1;
        }
//        $insert['nomor'] = $nomor;
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
        $get = $this->db()->orderBy('id', 'DESC')->get();
        if (count($get) > 0) {
            return $get;
        }
        return false;
    }

    public function getPesananByPlatAndDate($plat_nomor, $date)
    {
        $where = [
            'plat_nomor' => $plat_nomor,
            'tanggal' => $date
        ];
        $get = $this->db()->where($where)->get();
        if (count($get) > 0) {
            return $get;
        }
        return false;
    }

    public function getPesananByPlatAndDateAndPlace($plat_nomor, $date, $tempat_parkir)
    {
        $where = [
            'plat_nomor' => $plat_nomor,
            'tanggal' => $date,
            'tempat_parkir' => $tempat_parkir,
        ];
        $get = $this->db()->where($where)->get();
        if (count($get) > 0) {
            return $get;
        }
        return false;
    }

    public function getPesananByDate($date, $id = null)
    {
        if ($id !== null) {
            $get = $this->db()->where('id', $id)->where('tanggal', $date)->get();
            if (count($get) > 0) {
                return $get;
            }
            return false;
        }
        $get = $this->db()->orderBy('id', 'DESC')->where('tanggal', $date)->get();
        if (count($get) > 0) {
            return $get;
        }
        return false;
    }

    public function changeStatus($id, $status)
    {
        $do = $this->db()->where('id', $id)->update(['status' => $status]);
        if ($do) {
            return true;
        }
        return false;
    }
}
