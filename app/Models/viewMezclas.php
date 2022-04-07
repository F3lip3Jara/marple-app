<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
