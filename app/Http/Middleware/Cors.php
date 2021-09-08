<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        return $next($request);

        //->header('Access-Control-Request-Headers', 'Origin, X-Requested-With, Content-Type, Accept , access_token ')
        //->header('Access-Control-Allow-Methods', 'GET' , 'POST');
    }
}
