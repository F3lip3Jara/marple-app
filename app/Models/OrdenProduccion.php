<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class OrdenProduccion extends Model
{
    use HasFactory;

    protected $table    ='ord_produccion';
    protected $fillable = [
        'idOrp',
        'empId',
        'idPrv',
        'orpNumOc',
        'orpNumRea',
        'orpFech',
        'orpUsrG',
        'orpObs',
        'orpTurns',
        'orpEst',
        'orpEstPrc',
        'idEta'
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
