<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewProveedorDir extends Model
{
    use HasFactory;
    protected $table    ='proveedores_dir';

    protected $fillable = [
        'id',
        'rut',
        'pais',
        'region',
        'comuna',
        'ciudad',
        'direccion',
        'numero'

    ];
}
