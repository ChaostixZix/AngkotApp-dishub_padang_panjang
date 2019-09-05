<?php

namespace App\Http\Controllers\Feature;

use App\authModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    private function authModel()
    {
        return new authModel();
    }

    public function registerAjax(Request $request)
    {
        $data = ['nama_lengkap', 'username', 'password', 'level'];
        $data_insert = [];
        foreach ($data as $d) {
            $data_insert[$d] = $request->input($d);
        }
        $do = $this->authModel()->registerRaw($data_insert);
        if($do)
        {
            $return = [
                'status' => 'true',
            ];
        }else{
            $return = [
                'status' => 'false',
                'reason' => 'unknown'
            ];
        }
        return json_encode($return);
    }

    public function verify($id, $status)
    {
        $do = $this->authModel()->verify($id, $status);
        if($do)
        {
            return 'true';
        }
        return 'false';
    }
}
