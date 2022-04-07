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
        'http://127.0.0.1:8000/updRoles',
        'http://127.0.0.1:8000/insRoles',
        'http://127.0.0.1:8000/delRoles',
        'http://127.0.0.1:8000/insEtapas',
        'http://127.0.0.1:8000/delEtapas',
        'http://127.0.0.1:8000/udpEtapas',
        'http://127.0.0.1:8000/insEtapasDet',
        'http://127.0.0.1:8000/delEtapasDet',
        'http://127.0.0.1:8000/updEtapasDet',
        'http://127.0.0.1:8000/insUser',
        'http://127.0.0.1:8000/up_Password',
        'http://127.0.0.1:8000/insGerencia',
        'http://127.0.0.1:8000/updGerencia',
        'http://127.0.0.1:8000/delGerencia',
        'http://127.0.0.1:8000/setUserSession',
        'http://127.0.0.1:8000/valUsuario',
        'http://127.0.0.1:8000/upUsuario',
        'http://127.0.0.1:8000/upUsuario2',
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
        'http://127.0.0.1:8000/updProveedor',
        'http://127.0.0.1:8000/delPrvDir',
        'http://127.0.0.1:8000/insMoneda',
        'http://127.0.0.1:8000/updMoneda',
        'http://127.0.0.1:8000/delMoneda',
        'http://127.0.0.1:8000/insColor',
        'http://127.0.0.1:8000/updColor',
        'http://127.0.0.1:8000/delColor',
        'http://127.0.0.1:8000/insUnidad',
        'http://127.0.0.1:8000/updUnidad',
        'http://127.0.0.1:8000/delUnidad',
        'http://127.0.0.1:8000/insGrupo',
        'http://127.0.0.1:8000/updGrupo',
        'http://127.0.0.1:8000/delGrupo',
        'http://127.0.0.1:8000/insSubGrupo',
        'http://127.0.0.1:8000/updSubGrupo',
        'http://127.0.0.1:8000/delSubGrupo',
        'http://127.0.0.1:8000/insProducto',
        'http://127.0.0.1:8000/updProducto',
        'http://127.0.0.1:8000/insOrd',
        'http://127.0.0.1:8000/insOT',
        'http://127.0.0.1:8000/insMaquinas',
        'http://127.0.0.1:8000/updMaquinas',
        'http://127.0.0.1:8000/delMaquinas',
        'http://127.0.0.1:8000/insCalJul',
        'http://127.0.0.1:8000/updCalJul',
        'http://127.0.0.1:8000/delCalJul',
        'http://127.0.0.1:8000/insLogSys',
        'http://127.0.0.1:8000/insMezcla',
        'http://127.0.0.1:8000/confMezcla',
        'http://127.0.0.1:8000/rechaMezcla'





    ];
}
