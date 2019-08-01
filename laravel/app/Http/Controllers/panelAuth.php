<?php

namespace App\Http\Controllers;

use App\auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class panelAuth extends Controller
{

    private function auth_model()
    {
        return new auth();
    }
    public function loginPage()
    {

        return view('panel.auth.login');
    }

    public function logout()
    {
        Session::flush();
        return redirect(route('loginPage'));
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $do = $this->auth_model()->login($username, $password);
        if(!$do)
        {
            return redirect(route('loginPage'));
        }

        Session::put(
            [
                'username' => $username,
                'level' => $do //do Return level
            ]
        );
        return redirect(route('depanPanel'));
    }
}
