<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

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
