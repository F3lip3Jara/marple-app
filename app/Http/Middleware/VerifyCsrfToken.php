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
        'http://127.0.0.1:8000/udpEtapas',
        'http://127.0.0.1:8000/insUser',
        'http://127.0.0.1:8000/up_Password',
        'http://127.0.0.1:8000/insGerencia',
        'http://127.0.0.1:8000/updGerencia',
        'http://127.0.0.1:8000/delGerencia',
        'http://127.0.0.1:8000/setUserSession',
        'http://127.0.0.1:8000/valUsuario',
        'http://127.0.0.1:8000/upUsuario',
        'http://127.0.0.1:8000/updEtapas',
        'http://127.0.0.1:8000/insPais',
        'http://127.0.0.1:8000/delPais',
        'http://127.0.0.1:8000/updPais',
        'http://127.0.0.1:8000/insRegion',
        'http://127.0.0.1:8000/delRegion',
        'http://127.0.0.1:8000/updRegion',
        'http://127.0.0.1:8000/insComuna',
        'http://127.0.0.1:8000/delComuna',
        'http://127.0.0.1:8000/updComuna',
        'http://127.0.0.1:8000/insCiudad',
        'http://127.0.0.1:8000/delCiudad',
        'http://127.0.0.1:8000/updCiudad',
        'http://127.0.0.1:8000/insProveedor',
        'http://127.0.0.1:8000/insPrvDes',
        'http://127.0.0.1:8000/updProveedor'


    ];
}
