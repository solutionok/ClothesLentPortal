<?php

namespace App\Http\Middleware;

use Request;
use Closure;
use Auth;

class Client{

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
        	if (Auth::user()->privilege != 0) { // Not admin
            	return $next($request);
            }
        }
        return redirect('?authenticate=invalid&URI='.Request::url());
    }

}