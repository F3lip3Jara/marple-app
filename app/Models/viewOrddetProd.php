<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewOrddetProd extends Model
{
    use HasFactory;
    protected $table    ='ordenes_de_trabajos_det';
    protected $fillable = [
    'id',
     'orden_produccion',
     'ordtdPrdCod'];
}
