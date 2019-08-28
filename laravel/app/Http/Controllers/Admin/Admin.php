<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\web\aduanModel;
use App\web\derekModel;
use App\web\parkirModel;
use App\web\postModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Admin extends Controller
{
    private function postModel()
    {
        return new postModel();
    }

    private function derekModel()
    {
        return new derekModel();
    }

    private function parkirModel()
    {
        return new parkirModel();
    }

    private function aduan_model()
    {
        return new aduanModel();
    }

    public function postPage()
    {
        $data['post'] = $this->postModel()->get();
        $data['postCategory'] = $this->postModel()->getCategories();
        return view('panel.admin.post')->with($data);
    }

    public function aduanPage()
    {
        Carbon::setLocale('id');
        $data = [
            'body' => 'app-contact contact-content-show',
            'listAduan' => $this->aduan_model()->getAduanForView()
        ];
        return view('panel.admin.aduan')->with($data);
    }

    public function derekPesananPage()
    {
        Carbon::setLocale('id');
        $data = [
            'body' => 'app-contact contact-content-show',
            'pesanan' => $this->derekModel()->getPesananForView()
        ];
        return view('panel.admin.derekPesanan')->with($data);
    }

    public function parkirPesananPage()
    {
        $data = [
            'body' => 'app-contact contact-content-show',
            'pesanan' => $this->parkirModel()->getPesanan()
        ];
        return view('panel.admin.parkirPesanan')->with($data);
    }

    public function parkirPesananSearchPage()
    {
        $data = [
            'body' => 'app-contact contact-content-show',
        ];
        return view('panel.admin.parkirPesananSearch')->with($data);
    }
}
