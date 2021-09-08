<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HeadersSeguros
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
     //   $this->removerCabecerasNoAdmitidas($this->headersNoAdmitidos);
        $response = $next($request);
       /* $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Strict-Transport-Security', 'max-age:31536000; includeSubDomains');
        $response->headers->set('Content-Security-Policy', "style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline'"); // Esta cabecera si depende mucho de tu aplicación (Leer más después del código)*/


        $response->header->set('Access-Control-Allow-Origin', '*');
        $response->header->set('Access-Control-Allow-Methods', 'GET' , 'POST');
        $response->header->set('Access-Control-Allow-Headers', 'Origin , X-Requested-With, Content-Type, Accept ,access_token');
       // $response->header->set('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

        return $response;
    }

    private function removerCabecerasNoAdmitidas($listaCabeceras)
    {
        foreach ($listaCabeceras as $cabecera)
            header_remove($cabecera);
    }
}
