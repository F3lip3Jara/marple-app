<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
