<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtrusionDet extends Model
{
    use HasFactory;

    protected $table    ='extrusion_det';
    protected $fillable = [
        'idExtd',
        'empId',
        'idExt',
        'extdIzq',
        'extdCen',
        'extdDer',
        'extdEst',
        'extdHorIni',
        'extdHorFin',
        'extdUso',
        'extdRol',
        'extdTip',
        'extdObs'

    ];
}
