<?php

namespace App\Http\Controllers\Feature;

use App\authModel;
use App\web\profilModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Profil extends Controller
{
    private function model()
    {
        return new profilModel();
    }

    private function authModel()
    {
        return new authModel();
    }


    public function update(Request $request)
    {
        $username = Session::get('username');
        $data = [
            'nik' => 'inputNik',
            'nama_lengkap' => 'inputNamaLengkap',
            'jenis_kelamin' => 'inputJenisKelamin',
            'tempat_lahir' => 'inputTempatLahir',
            'agama' => 'inputAgama',
            'pendidikan' => 'inputPendidikan',
            'jenis_pekerjaan' => 'inputJenisPekerjaan',
            'status_perkawinan' => 'inputStatusPerkawinan',
            'status_hubungan_dalam_keluarga' => 'inputStatusHubunganDalamKeluarga',
            'kewarganegaraan' => 'inputKewarganegaraan',

            'no_passport' => 'inputNoPassport',
            'no_kta' => 'inputNoKta',

            'nama_ayah' => 'inputNamaAyah',
            'nama_ibu' => 'inputNamaIbu',

            'alamat' => 'inputAlamatLengkap',
            'rt_rw' => 'inputRtRw',
            'desa_kelurahan' => 'inputDesaKelurahan',
            'kecamatan' => 'inputKecamatan',
            'kabupaten_kota' => 'inputKabupatenKota',
            'provinsi' => 'inputProvinsi',

            'no_hp' => 'inputNoHp',
            'email' => 'inputEmail',

            'facebook' => 'inputFacebook',
            'twitter' => 'inputTwitter',

            'jenis_kendaraan' => 'jenis_kendaraan',
            'plat_nomor' => 'plat_nomor'
        ];
        $dataInsert = [];
        foreach ($data as $i  => $val)
        {
            $dataInsert[$i] = $request->input($val);
        }
        if($request->hasFile('inputFoto'))
        {
            $file = $request->file('inputFoto');
            $nama_folder = $username;
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'fileFotoProfil/' . $nama_folder;
            $file->move($tujuan_upload, $nama_file());
            $dataInsert['file_foto'] = $nama_folder . "/" . $nama_file;
        }

        $do = $this->model()->updateProfil($username, $dataInsert);
        $do2 = $this->authModel()->updateRaw($username, [
            'nama_lengkap' => $dataInsert['nama_lengkap']
        ]);
        if($do && $do2)
        {
            return 'true';
        }
        return 'false';
    }

    public function buat()
    {
        $username = Session::get('username');
        $do = $this->model()->buat($username);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

}
