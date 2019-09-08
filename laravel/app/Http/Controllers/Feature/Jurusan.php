<?php

namespace App\Http\Controllers\Feature;

use App\web\angkotModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Jurusan extends Controller
{
    private function angkotModel()
    {
        return new angkotModel();
    }

    public function create(Request $request)
    {
        $awal_jurusan = $request->input('awal_jurusan');
        $tujuan_jurusan = $request->input('tujuan_jurusan');
        $rute = $request->input('rute');


        $do = $this->angkotModel()->createJurusan($awal_jurusan, $tujuan_jurusan, $rute);
        if ($do) {
            return 'true';
        }
        return 'false';
    }

    public function update(Request $request)
    {
        $awal_jurusan = $request->input('awal_jurusan');
        $tujuan_jurusan = $request->input('tujuan_jurusan');
        $rute = $request->input('rute');

//        $rute = json_encode($rute);
        $id = $request->input('id');
        $do = $this->angkotModel()->updateJurusan($id, $awal_jurusan, $tujuan_jurusan, $rute);
        if ($do) {
            return 'true';
        }
        return 'false';
    }

    public function delete($id)
    {
        $do = $this->angkotModel()->deleteJurusan($id);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }

    public function getData($id)
    {
        $get = $this->angkotModel()->getJurusan($id);
        if($get !== null && count($get) > 0)
        {
            return json_encode($get->toArray());
        }
        return 'false';
    }
}
