<?php

namespace App\Http\Middleware;

use Request;
use Closure;
use Auth;

class Admin{

    public function handle($request, Closure $next)
    {
         if (Auth::check() && Auth::user()->isAdmin()) {
             return $next($request);
         }
         return redirect('admin?authenticate=invalid&URI='.Request::url());
        return $next($request);
    }

}