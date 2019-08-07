<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\web\aduanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    private function aduan_model()
    {
        return new aduanModel();
    }

    public function pengaduanPage()
    {
        Carbon::setLocale('id');
        $data = [
            'body' => 'app-contact contact-content-show',
            'listAduan' => $this->aduan_model()->getAduanForViewByPengadu(Session::get('username'))
        ];
        return view('panel.user.aduan')->with($data);
    }
}
