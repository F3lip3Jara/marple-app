<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class viewMezclas extends Model
{
    use HasFactory;

    protected $table    ='mezclas';
    protected $fillable = [
         'id',
         'usuario',
         'lote_salida',
         'kilos',
         'maquina',
         'etapa',
         'producto',
         'tipo',
         'estado_pro',
         'estado_control',
         'turno',
         'created_at',
         'updated_at',
         'observaciones'

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
