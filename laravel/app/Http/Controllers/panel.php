<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class panel extends Controller
{
    public function depan()
    {
        if(Session::get('level') == 'admin')
        {
            return view('panel.admin.depan');
        }else{
            return view('panel.user.depan');
        }
    }
}
