<?php

namespace App\Http\Controllers\Feature;

use App\Jobs\sendPesananEmail;
use App\web\manage\saldoModel;
use App\web\parkirModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Parkir extends Controller
{
    private function parkirModel()
    {
        return new parkirModel();
    }

    private function saldoModel()
    {
        return new saldoModel();
    }

    public function getJarak(Request $request)
    {
        $koordinat_jemput = $request->input('koordinat_jemput');
        $koordinat_antar = $request->input('koordinat_antar');
        $jarak = $this->parkirModel()->getJarak($koordinat_jemput, $koordinat_antar);

        return $jarak;
    }

    public function ajaxSearchPage($plat_nomor)
    {
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d');
        $get = $this->parkirModel()->getPesananByPlatAndDate($plat_nomor, $date);
        if ($get !== false) {
            $data = [
                'detail' => $get
            ];
            return view('panel.admin.fitur.ajaxParkirSearch')->with($data);
        }
        return 'false';
    }

    public function invoicePage($id)
    {
        $data = [
            'data' => $this->parkirModel()->getPesanan($id),
        ];
        return view('panel.user.invoiceParkir')->with($data);
    }

    public function finishParkir($id)
    {
        $do = $this->parkirModel()->changeStatus($id, 1);
        if ($do) {
            $return = [
                'status' => 'true',
            ];
        } else {
            $return = [
                'status' => 'false',
                'reason' => 'error, call developer'
            ];
        }
        return json_encode($return);
    }

    public function pesan(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $data = ['pemesan', 'tempat_parkir', 'jenis_kendaraan', 'plat_nomor', 'nama_pemesan', 'nohp_pemesan'];
        $data_insert = [];
        foreach ($data as $d) {
            $data_insert[$d] = $request->input($d);
        }
        $data_insert['tanggal'] = date('Y-m-d');
        $data_insert['harga'] = $this->parkirModel()->getHarga($data_insert['tempat_parkir'], $data_insert['jenis_kendaraan']);

//        $cek_saldo_user = $this->saldoModel()->cekAvailibility($data_insert['pemesan'], $data_insert['harga']);
//        if($cek_saldo_user == true)
//        {
        if (!$this->parkirModel()->getPesananByPlatAndDateAndPlace($data_insert['plat_nomor'], $data_insert['tanggal'], $data_insert['tempat_parkir'])) {
            $do = $this->parkirModel()->pesanParkirRaw($data_insert);
            if ($do !== false) {
//                $this->saldoModel()->kurangi($data_insert['pemesan'], $data_insert['harga']);
                $return = [
                    'status' => 'true',
                    'invoiceId' => $do,
                    'reason' => ''
                ];
                $details = [
                    'idPesanan' => $return['invoiceId'],
                    'pemesan' => $data_insert['pemesan'],
                    'harga' => $data_insert['harga'],
                    'jenis_pesanan' => 'derek'
                ];
                dispatch(new sendPesananEmail($details));
            } else {
                $return = [
                    'status' => 'false',
                    'reason' => 'error'
                ];
            }
        } else {
            $return = [
                'status' => 'false',
                'reason' => 'Sudah memiliki spot'
            ];
        }
//        }else{
//            $return = [
//                'status' => 'false',
//                'reason' => 'saldo_kurang'
//            ];
//        }
        return json_encode($return);
    }

    public function getPesanan($id)
    {
        $get = $this->parkirModel()->getPesanan($id);
        if ($get !== false) {
            return json_encode($get);
        }
        return 'false';
    }
}
