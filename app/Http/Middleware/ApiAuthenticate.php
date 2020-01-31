<?php

namespace App\Http\Middleware;

use Closure,Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthManager;
use Illuminate\Auth\TokenGuard;
use App\Models\User;

class ApiAuthenticate
{   
    public function __construct(Request $request, AuthManager $auth)
    {
        $this->HeaderSecKey = 'Authorization';
        $this->auth = $auth;
    }
    
    public function handle($request, Closure $next, $guard = 'api') {
        if($this->auth->guard($guard)->user())
        {
            return $next($request);  
        } 
        else
        {
            return response([
                        'code' => UNAUTHORIZED,
                        'msg' => MSG_UNAUTHORIZED,
                        'data'=>(object) null
                        ],
                        HTTP_UNAUTHORIZED
                        );
        }   
    }
}