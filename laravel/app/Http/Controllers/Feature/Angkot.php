<?php

namespace App\Http\Controllers\Feature;

use App\web\angkotModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Angkot extends Controller
{
    private function angkotModel()
    {
        return new angkotModel();
    }

    public function create(Request $request)
    {
        $name = $request->input('nama_angkot');
        $do = $this->angkotModel()->createAngkot($name);
        if ($do) {
            return 'true';
        }
        return 'false';
    }

    public function update(Request $request)
    {
        $data_insert = [];
        $input = ['nama_angkot', 'id_jurusan', 'nomor_registrasi', 'nama_pemilik', 'merk', 'jenis', 'tahun_pembuatan', 'isi_silinder', 'warna_kb', 'no_rangka', 'no_mesin', 'no_bpkb', 'bahan_bakar', 'warna_tnkb', 'no_pol_lama', 'berat_kb', 'jumlah_sumbu', 'jumlah_penumpang', 'supir'];
        foreach ($input as $a) {
            $data_insert[$a] = $request->input($a);
        }
        $id = $request->input('id');
        $do = $this->angkotModel()->updateAngkotRaw($id, $data_insert);
        if ($do) {
            return 'true';
        }
        return 'false';
    }

    public function delete($id)
    {
        $do = $this->angkotModel()->deleteAngkot($id);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    public function getSupirData($id)
    {
        $get = $this->angkotModel()->getSupirProfil($id);
        if($get !== null && count($get) > 0)
        {
            $data = [
                'detail' => $this->angkotModel()->getSupirProfil($id)
            ];
            return view('panel.admin.angkot.ajaxProfilSupir')->with($data);
        }
        return 'false';
    }

    public function getJurusanData($id)
    {
        $get = $this->angkotModel()->getSupirProfil($id);
        if($get !== null && count($get) > 0)
        {
            $data = [
                'dataJurusan' => $this->angkotModel()->getJurusanData($id)
            ];
            return view('panel.public.ajaxDataJurusan')->with($data);
        }
        return 'false';
    }

    public function gantiJurusan($id_angkot, $id_jurusan)
    {
        $do = $this->angkotModel()->updateAngkotRaw($id_angkot, ['id_jurusan' => $id_jurusan]);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    public function getData($id)
    {
        $get = $this->angkotModel()->getAngkot($id);
        if($get !== null && count($get) > 0)
        {
            return json_encode($get->toArray());
        }
        return 'false';
    }
}
