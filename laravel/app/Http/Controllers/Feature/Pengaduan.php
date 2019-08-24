<?php


namespace App\Http\Controllers\Feature;


use App\Http\Controllers\Controller;
use App\web\aduanModel;
use Illuminate\Http\Request;

class Pengaduan extends Controller
{
    private function aduan_model()
    {
        return new aduanModel();
    }

    function getAduanById(Request $request)
    {
        $id = $request->input('id');
        $get = $this->aduan_model()->getAduan($id);
        return json_encode($get);
    }

    function new(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");

        $judul = $request->input('inputJudul');
        $tindakan = $request->input('inputTindakan');
        $aduan = $request->input('inputAduan');
        $pengadu = $request->input('pengadu');
        $tanggal_pengaduan = date('Y-m-d H:i:s');
        $gambar = null;

        if($request->hasFile('inputGambar'))
        {
            $file = $request->file('inputGambar');
            $nama_folder = substr_replace(' ', '_',  $judul);
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'aduanGambar/' . $nama_folder;
            $file->move($tujuan_upload, $nama_file);
            $gambar = $nama_folder . "/" . $nama_file;
        }

        $do = $this->aduan_model()->newAduan($judul, $tindakan, $aduan, $pengadu, $gambar, $tanggal_pengaduan);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    function update(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $id = $request->input('id');
        $judul = $request->input('inputJudul');
        $jenis_aduan = $request->input('inputJenisAduan');
        $aduan = $request->input('inputAduan');
        $gambar = null;

        if($request->hasFile('inputGambar'))
        {
            $file = $request->file('inputGambar');
            $nama_folder = substr_replace(' ', '_',  $judul);
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'aduanGambar/' . $nama_folder;
            $file->move($tujuan_upload, $nama_file);
            $gambar = $nama_folder . "/" . $nama_file;
        }
        $do = $this->aduan_model()->updateAduan($id, $judul, $jenis_aduan, $aduan, $gambar);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    function changeStatus($id, $status)
    {

    }

    function delete(Request $request)
    {
        $id = $request->input('id');

        $do = $this->aduan_model()->deleteAduan($id);
        if ($do) {
            return 'true';
        }
        return 'false';
    }
}