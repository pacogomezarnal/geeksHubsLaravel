<?php

namespace App\Http\Middleware;

use Closure;

class SignatureMiddleWare
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
        $response = $next($request);
        $response->headers->set('App-Name','Paco-App');
        return $response;
    }
}
