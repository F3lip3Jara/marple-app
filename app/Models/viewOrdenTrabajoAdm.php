<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class viewOrdenTrabajoAdm extends Model
{
    use HasFactory;

    protected $table    ='ordenes_de_trabajos';

    protected $fillable = [
    'id',
    'orden_produccion',
    'orden_prod_fec ',
    'usuario_genera ',
    'estado ',
    'prioridad',
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
