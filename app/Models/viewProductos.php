<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewProductos extends Model
{
    use HasFactory;

    protected $table    ='productos';

    protected $fillable = [
        'id',
        'cod_pareo',
        'descripcion',
        'observaciones',
        'cod_rapido',
        'cod_barra',
        'tipo',
        'grupo',
        'sub_grupo',
        'color',
        'moneda','costo',
        'neto',
        'bruto',
        'inventariable',
        'peso',
        'minimo',
        'medida',
        'created_at',
        'updated_at'
        ];

}
