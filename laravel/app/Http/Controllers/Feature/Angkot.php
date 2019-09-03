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
        $input = ['nama_angkot', 'jurusan', 'nomor_registrasi', 'nama_pemilik', 'merk', 'jenis', 'tahun_pembuatan', 'isi_silinder', 'warna_kb', 'no_rangka', 'no_mesin', 'no_bpkb', 'bahan_bakar', 'warna_tnkb', 'no_pol_lama', 'berat_kb', 'jumlah_sumbu', 'jumlah_penumpang', 'rute'];
        foreach ($input as $a) {
            $data_insert[$a] = $request->input($a);
        }
        $data_insert['rute'] = json_encode($data_insert['rute']);
        $id = $request->input('id');
        $do = $this->angkotModel()->updateAngkotRaw($id, $data_insert);
        if ($do) {
            return 'true';
        }
        return 'false';
    }
}
