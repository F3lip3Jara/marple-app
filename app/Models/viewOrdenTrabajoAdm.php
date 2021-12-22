<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'updated_at'];

}
