<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Producto extends Model
{
    use HasFactory;

    protected $table    ='producto';
    protected $fillable = [
        'idPrd',
        'prdCod',
        'prdDes',
        'prdObs',
        'prdRap',
        'prdEan',
        'prdTip',
        'prdCost',
        'prdNet',
        'prdBrut',
        'prdInv',
        'prdPes',
        'prdMin',
        'idMon',
        'idGrp',
        'idSubGrp',
        'idUn',
        'idCol'
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
