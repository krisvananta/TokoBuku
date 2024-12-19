<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    // cek 
    public function handle($request, Closure $next)
    {
        if(Auth::user()->level !='admin'){
            return redirect()->back();
        }
        return $next($request);
    }
}
