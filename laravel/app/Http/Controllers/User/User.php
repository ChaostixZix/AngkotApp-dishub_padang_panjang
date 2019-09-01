<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\web\aduanModel;
use App\web\parkirModel;
use App\web\profilModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    private function aduan_model()
    {
        return new aduanModel();
    }

    private function parkirModel()
    {
        return new parkirModel();
    }

    private function profilModel()
    {
        return new profilModel();
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

    public function derekPage()
    {
        $username = Session::get('username');
        $data = [
            'dataProfil' => $this->profilModel()->get($username)[0],
        ];
        return view('panel.user.derek')->with($data);
    }

    public function parkirPage()
    {
        $username = Session::get('username');
        date_default_timezone_set("Asia/Bangkok");
        $data = [
            'tempat_parkir_list' => $this->parkirModel()->getTempatParkirAvailableToday(date('Y-m-d')),
            'dataProfil' => $this->profilModel()->get($username)[0],
        ];
        return view('panel.user.parkir')->with($data);
    }

    public function test()
    {
        return json_encode($this->parkirModel()->getTempatParkirAvailableToday(date('Y-m-d')));
    }
}
