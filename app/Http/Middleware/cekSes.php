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
    public function handle($request, Closure $next)
    {
        if(!Session::has('username'))
        {
            return redirect()->route('loginPage');
        }
        return $next($request);
    }
}
