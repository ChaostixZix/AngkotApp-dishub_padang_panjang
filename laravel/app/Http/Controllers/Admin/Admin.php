<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\web\postModel;
use Illuminate\Http\Request;

class Admin extends Controller
{
    private function postModel()
    {
        return new postModel();
    }

    public function postPage()
    {
        $data['post'] = $this->postModel()->get();
        return view('panel.admin.post')->with($data);
    }

}
