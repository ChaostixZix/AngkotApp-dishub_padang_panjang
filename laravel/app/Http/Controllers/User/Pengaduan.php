<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\web\aduanModel;
use Illuminate\Http\Request;

class Pengaduan extends Controller
{
    private function aduan_model()
    {
        return new aduanModel();
    }

    function new(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");

        $judul = $request->input('inputJudul');
        $jenis_aduan = $request->input('inputJenisAduan');
        $aduan = $request->input('inputAduan');
        $pengadu = $request->input('pengadu');
        $created_at = date('Y-m-d H:i:s');

        $do = $this->aduan_model()->newAduan($judul, $jenis_aduan, $aduan, $pengadu, $created_at);
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
        $updated_at = date('Y-m-d H:i:s');

        $do = $this->aduan_model()->updateAduan($id, $judul, $jenis_aduan, $aduan, $updated_at);
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