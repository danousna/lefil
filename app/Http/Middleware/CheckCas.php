<?php

namespace App\Http\Middleware;

use Closure;
use App\Cas;

class CheckCas
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
        if ($request->session()->has('username')) {
            return $next($request);
        } else {
            // If no data found in Session, redirect to /register/cas
            return redirect()->route('register.cas');
        }
    }
}
