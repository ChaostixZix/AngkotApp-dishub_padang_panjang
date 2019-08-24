<?php

namespace App\Http\Controllers;

use App\web\aduanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class publik extends Controller
{
    private function aduan_model()
    {
        return new aduanModel();
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

}
