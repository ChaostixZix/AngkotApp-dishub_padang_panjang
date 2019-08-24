<?php

namespace App\Http\Controllers\Feature;

use App\web\derekModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Derek extends Controller
{
    private function derekModel()
    {
        return new derekModel();
    }

    public function invoicePage($id)
    {
        $data = [
            'data' => $this->derekModel()->getPesanan($id),
        ];
        if(Session::get('level') == "admin")
        {
            $data['supirList'] = $this->derekModel()->getSupirList();
        }
        return view('panel.user.invoiceDerek')->with($data);
    }

    public function getInfoOfOrigins(Request $request)
    {
        $address = $request->input('origins');
        $address = str_replace(" ", "+", $address);
        $key = "AIzaSyAa0UwQAFnGd9eGwP2UDY4mWWVXXMrTb0Q";
        $data = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=" . $key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function getHarga(Request $request)
    {
        $koordinat_jemput = $request->input('koordinat_jemput');
        $koordinat_antar = $request->input('koordinat_antar');
        $jarak = $this->derekModel()->countHarga($koordinat_jemput, '-0.454986, 100.399860');
        $jarak = $jarak + $this->derekModel()->countHarga($koordinat_jemput, $koordinat_antar);

        return $jarak;
    }

    public function getJarak(Request $request)
    {
        $koordinat_jemput = $request->input('koordinat_jemput');
        $koordinat_antar = $request->input('koordinat_antar');
        $jarak = $this->derekModel()->getJarak($koordinat_jemput, '-0.454986, 100.399860');
        $jarak = $jarak + $this->derekModel()->getJarak($koordinat_jemput, $koordinat_antar);

        return $jarak;
    }

    public function pesanDerek(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $array_data = ['pemesan', 'koordinat_pemesan', 'alamat_jemput', 'koordinat_jemput', 'alamat_antar', 'koordinat_antar', 'nama_pemesan', 'nohp_pemesan'];
        $data_pesanan = [];
        foreach ($array_data as $index) {
            $data_pesanan[$index] = $request->input($index);
        }
        $koordinatGarasi = '';
        $data_pesanan['harga'] = $this->derekModel()->countHarga($data_pesanan['koordinat_jemput'], '-0.454986, 100.399860');
        $data_pesanan['harga'] = $data_pesanan['harga'] + $this->derekModel()->countHarga($data_pesanan['koordinat_jemput'], $data_pesanan['koordinat_antar']);
        $data_pesanan['jarak'] = $this->derekModel()->getJarak($data_pesanan['koordinat_jemput'], '-0.454986, 100.399860');
        $data_pesanan['jarak'] = (int)$data_pesanan + (int)$this->derekModel()->getJarak($data_pesanan['koordinat_jemput'], $data_pesanan['koordinat_antar']);

        $data_pesanan['date'] = date('Y-m-d');
        $data_pesanan['time'] = date('h:i:s');
        $createPesan = $this->derekModel()->createPesananRaw($data_pesanan);
        if ($createPesan) {
            return $createPesan;
        }
        return false;
    }

    public function changeStatusDerek($id, $status, $supir)
    {
        $do = false;
        switch ($status) {
            case '1':
                $do = $this->derekModel()->terimaPesanan($id, $supir);
                break;
            case '2':
                $do = $this->derekModel()->prosesPesanan($id);
                break;
            case '3':
                $do = $this->derekModel()->finishPesanan($id);
                break;
        }
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    public function getPesanan($id)
    {
        $get = $this->derekModel()->getPesanan($id);
        return json_encode($get);
    }

}
