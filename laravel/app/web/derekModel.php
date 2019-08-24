<?php

namespace App\web;

use App\auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class derekModel extends Model
{
    private function db()
    {
        return DB::table('data_pesanan_derek');
    }
    private function auth_model()
    {
        return new auth();
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

    public function getSupirList()
    {
        $get = $this->auth_model()->db()->where('level','supir')->get()->toArray();
        if($get)
        {
            return $get;
        }
        return false;
    }

    public function countHarga($koordinat_pesan, $koordinat_garasi)
    {
        $getJarak = $this->getJarak($koordinat_pesan, $koordinat_garasi);
        $harga = $getJarak * 30000;
        return $harga;
    }

    public function createPesanan($pemesan, $alamat_jemput, $koordinat_jemput, $alamat_antar, $koordinat_antar, $nama_pemesan, $nohp_pemesan, $harga)
    {
        $data = [
            'pemesan' => $pemesan,
            'alamat_jemput' => $alamat_jemput,
            'koordinat_jemput' => $koordinat_jemput,
            'alamat_antar' => $alamat_antar,
            'koordinat_antar' => $koordinat_antar,
            'nama_pemesan' => $nama_pemesan,
            'nohp_pemesan' => $nohp_pemesan,
            'harga' => $harga
        ];

        $insert = $this->db()->insert($data);
        if($insert)
        {
            return true;
        }
        return false;
    }
    public function createPesananRaw(array  $insert)
    {

        $do = $this->db()->insert($insert);
        if($do)
        {
            return $this->db()->where($insert)->get()->pluck('id')[0];
        }
        return false;
    }

    public function getPesananAll()
    {
        return $this->db()->where('status', '!=', '3')->orderBy('date', 'DESC')->orderBy('time', 'DESC')->get();
    }

    public function getPesanan($id)
    {
        return $this->db()->where('id', $id)->get()->toArray();
    }

    public function getPesananForView()
    {
        $get = $this->getPesananAll();
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

    public function terimaPesanan($id)
    {
        $do = $this->updateStatusPesanan($id, '1');
        if($do)
        {
            return true;
        }
        return false;
    }
    public function prosesPesanan($id, $supir)
    {
        $this->db()->where('id', $id)->update(['supir' => $supir]);
        $do = $this->updateStatusPesanan($id, '2');
        if($do)
        {
            return true;
        }
        return false;
    }
    public function finishPesanan($id)
    {
        $do = $this->updateStatusPesanan($id, '3');
        if($do)
        {
            return true;
        }
        return false;
    }
    public function updateStatusPesanan($id, $status)
    {
        $update = [
            'status' => $status
        ];
        $do = $this->db()->where('id', $id)->update($update);
        if($do)
        {
            return true;
        }
        return false;
    }


}
