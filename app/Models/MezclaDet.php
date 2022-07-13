<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class MezclaDet extends Model
{
    use HasFactory;
    protected $table    ='mezcla_det';
    protected $fillable = [
        'idMez',
        'empId',
        'idMezd',
        'mezdidPrd',
        'mezdprdCod',
        'mezdprdTip',
        'mezdprdDes',
        'mezdLotIng',
        'mezdUso',
        'mezdKil',
        'mezdManual'
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
