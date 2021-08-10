<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='admin')
    {
        //dd(auth()->user());
        if (Auth::guard($guard)->check()) {
            //dd(444);
            return $next($request);
        }else{
            return redirect()->route('admin.loginpage');
        }

    }
}
