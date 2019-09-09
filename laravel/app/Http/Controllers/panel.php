<?php

namespace App\Http\Controllers;

use App\web\angkotModel;
use App\web\profilModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class panel extends Controller
{
    private function profilModel(){
        return new profilModel();
    }

    private function angkotModel(){
        return new angkotModel();
    }

    public function depan(){
        if(Session::get('level') == 'admin')
        {
            return view('panel.admin.depan');
        }else{
            if(Session::get('level') == 'supir') {
                $data = [
                    'listAngkot' => $this->angkotModel()->getAngkotOfSupir(Session::get('username')),
                    'dataJurusan' => $this->angkotModel()->getJurusan(),
                ];
                return view('panel.user.depan')->with($data);
            }
            return view('panel.user.depan');
        }
    }

    public function updateProfil(){
        $username = Session::get('username');
        $data = [
            'statusProfil' => $this->profilModel()->cek($username),
            'dataProfil' => $this->profilModel()->get($username),
        ];
        return view('panel.updateProfil')->with($data);
    }
}
