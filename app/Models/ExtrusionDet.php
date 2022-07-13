<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

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

    public function getCreatedAtAttribute($value){
        return Carbon::createFromTimestamp(strtotime($value))
        ->timezone(Config::get('app.timezone'))
        ->toDateTimeString();
    }
        
    public function getUpdatedAtAttribute($value){
        return Carbon::createFromTimestamp(strtotime($value))
        ->timezone(Config::get('app.timezone'))
        ->toDateTimeString();
    }
}
