<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class cekSes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $se = Session::get('username');
        if($se == false)
        {
            return redirect(route('loginPage'));
        }

        return $next($request);
    }
}
