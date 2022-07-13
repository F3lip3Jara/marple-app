<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $table    ='ord_trabajo';
    protected $fillable = [
        'idOrdt',
        'empId',
        'idOrp',
        'orptFech',
        'orptUsrG',
        'orptTurns',
        'orptEst',
        'orptPrio'

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
