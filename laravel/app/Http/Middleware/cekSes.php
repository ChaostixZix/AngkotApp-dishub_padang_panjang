<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class cekSes
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $routeName = $request->route()->getName();

        $se = Session::get('username');
        if ($se == false) {
            Session::pull('lastRoute');
            Session::pull('loginVisit');
            Session::push('lastRoute', $routeName);
            return redirect(route('loginPage'));
        }


        return $next($request);
    }
}
