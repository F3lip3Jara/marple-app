<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewOrdenProduccion extends Model
{
    use HasFactory;
    protected $table    ='orden_produccion';

    protected $fillable = [
    'id',
    'usuario',
    'orden_compra',
    'orden_produccion',
    'rut_cliente',
    'fecha',
    'estado_ord',
    'estado_pro',
    'observaciones',
    'created_at',
    'updated_at'];

}
