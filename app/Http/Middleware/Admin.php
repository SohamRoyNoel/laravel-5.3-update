<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {

        if (Auth::check()){

            if (Auth::user()->isAdmin() && Auth::user()->isActive()){
                return $next($request);
            }
        }



        return redirect('/');
    }
}
