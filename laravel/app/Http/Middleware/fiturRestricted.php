<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class fiturRestricted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $whitelist = ["tukang_parkir", 'admin', 'supir'];
        if(!in_array(Session::get('level'), $whitelist))
        {
            return redirect(route('depanPanel'));
        }
        return $next($request);
    }
}
