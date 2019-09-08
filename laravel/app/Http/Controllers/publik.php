<?php

namespace App\Http\Controllers;

use App\web\aduanModel;
use App\web\angkotModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class publik extends Controller
{
    private function aduan_model()
    {
        return new aduanModel();
    }
    private function angkotModel()
    {
        return new angkotModel();
    }
    public function depan()
    {
        return view('publik/depan');
    }

    public function aduan()
    {
        Carbon::setLocale('id');
        $data = [
            'listAduan' => $this->aduan_model()->getAduan()
        ];
        return view('panel.public.aduan_public')->with($data);
    }

    public function angkot()
    {
        Carbon::setLocale('id');
        $data = [
            'listAngkot' => $this->angkotModel()->getAngkot()
        ];
        return view('panel.public.angkot')->with($data);
    }

}
