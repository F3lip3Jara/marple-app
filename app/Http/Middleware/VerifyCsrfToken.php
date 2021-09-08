<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://127.0.0.1:8000/productos',
        'http://127.0.0.1:8000/log',
        'http://127.0.0.1:8000/filter',
        'http://127.0.0.1:8000/updProducto',
        'http://127.0.0.1:8000/updRoles',
        'http://127.0.0.1:8000/insRoles',
        'http://127.0.0.1:8000/delRoles',
        'http://127.0.0.1:8000/insEtapas',
        'http://127.0.0.1:8000/delEtapas',
        'http://127.0.0.1:8000/udpEtapas'

    ];
}
