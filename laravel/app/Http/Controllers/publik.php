<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publik extends Controller
{
    public function depan()
    {
        return view('publik/depan');
    }

}
