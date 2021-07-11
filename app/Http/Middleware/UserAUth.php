<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAUth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if($request->path() == 'login' && $request->session()->has('user')){
           return redirect('/');
       }
       if($request->path()== 'cartlist' && !$request->session()->has('user')){
        return redirect('/login');
       }
        return $next($request);
    }
}
