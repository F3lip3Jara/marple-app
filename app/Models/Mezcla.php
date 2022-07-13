<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Mezcla extends Model
{
    use HasFactory;

    protected $table    ='mezcla';
    protected $fillable = [
        'idMez',
        'empId',
        'mezUsu',
        'mezLotSal',
        'mezKil',
        'mezTip',
        'mezEst',
        'mezEstCtl',
        'mezMaq',
        'mezidEta',
        'mezprdCod',
        'mezidPrd',
        'mezprdDes',
        'mezTurn',
        'mezObs'
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
