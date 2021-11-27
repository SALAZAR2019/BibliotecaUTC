<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class logsesion
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
        if(Session::get('rol')=='Administrador')
            return $next($request);
        if(Session::get('rol')=='Bibliotecario')
            return $next($request);
        return redirect('/');
    }
}
