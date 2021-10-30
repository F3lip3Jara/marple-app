<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewProveedores extends Model
{
    use HasFactory;
    protected $table    ='proveedores';

    protected $fillable = [
        'id',
        'rut',
        'nombre',
        'nombre_fantasia',
        'giro',
        'pais',
        'region',
        'comuna',
        'ciudad',
        'direccion',
        'numero',
        'telefono',
        'es_cliente',
        'es_proveedor',
        'mail',
        'activo'

    ];
}
