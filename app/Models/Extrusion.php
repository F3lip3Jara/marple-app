<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrusion extends Model
{
    use HasFactory;


    protected $table    ='extrusion';
    protected $fillable = [
        'idExt',
        'empId',
        'extUsu',
        'extLotSal',
        'extAnbob',
        'extEst',
        'extEstCtl',
        'extFor',
        'extidEta',
        'extPrdCod',
        'extIdPrd',
        'extPrdDes',
        'extTurn',
        'extObs',
        'extMaq',
        'extIdMez',
        'extIdMot',
        'extKilApr',
        'extKilR'


    ];
}
