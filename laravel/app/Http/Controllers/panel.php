<?php

namespace App\Http\Controllers;

use App\web\profilModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class panel extends Controller
{
    private function profilModel(){
        return new profilModel();
    }

    public function depan(){
        if(Session::get('level') == 'admin')
        {
            return view('panel.admin.depan');
        }else{
            return view('panel.user.depan');
        }
    }

    public function updateProfil(){
        $username = Session::get('username');
        $data = [
            'statusProfil' => $this->profilModel()->cek($username)
        ];
        return view('panel.updateProfil')->with($data);
    }
}
