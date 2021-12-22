<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdTrabDet extends Model
{
    use HasFactory;


    protected $table    ='ord_trabajo_det';
    protected $fillable = [
        'idOrdtd',
        'idOrdt',
        'empId',
        'ordtdPrdCod',
        'ordtdPrdDes',
        'ortdSol',
        'ortdProd',
        'orpdObs'
    ];
}
