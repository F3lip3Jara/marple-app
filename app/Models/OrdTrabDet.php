<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class OrdTrabDet extends Model
{
    use HasFactory;


    protected $table    ='ord_trabajo_det';
    protected $fillable = [
        'idOrdtd',
        'idOrdt',
        'empId',
        'ordtdPrdCod',
        'ordtdPrdDes',
        'ortdSol',
        'ortdProd',
        'orpdObs'
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
