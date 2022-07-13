<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class viewExtrusion extends Model
{
    use HasFactory;
    protected $table    ='extrusiones';
    protected $fillable = [
        'id',
        'usuario',
        'lote_salida',
        'ancho_bobina',
        'maquina',
        'etapa',
        'producto',
        'estado_pro',
        'estado_control',
        'turno',
        'observaciones',
        'created_at',
        'updated_at'
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
