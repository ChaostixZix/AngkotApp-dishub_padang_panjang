<?php

namespace App\Http\Middleware;

use App\web\profilModel;
use Closure;
use Illuminate\Support\Facades\Session;

class cekProfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private function profilModel()
    {
        return new profilModel();
    }
    public function handle($request, Closure $next)
    {
        if(!$this->profilModel()->cekUntukAll(Session::get('username')))
        {
            return redirect(route('updateProfil'));
        }
        return $next($request);
    }
}
