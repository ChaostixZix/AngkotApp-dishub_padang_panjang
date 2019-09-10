<?php

namespace App\Http\Middleware;

use App\authModel;
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

    private function authModel()
    {
        return new authModel();
    }
    public function handle($request, Closure $next, $guard = null)
    {
        $levelVerifyFirst = ['petugas_parkir', 'supir'];
        $routeName = $request->route()->getName();

        $se = Session::get('username');
        if ($se == false) {
            Session::pull('lastRoute');
            Session::pull('loginVisit');
            Session::push('lastRoute', $routeName);
            return redirect(route('loginPage'));
        }elseif($se !== false && in_array(Session::get('level'), $levelVerifyFirst) && !$this->authModel()->isVerified($se))
        {
            return redirect(route('verifyFirst'));
        }


        return $next($request);
    }
}
