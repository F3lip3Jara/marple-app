<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdProDet extends Model
{
    use HasFactory;

    protected $table    ='ord_produccion_det';
    protected $fillable = [
        'idOrp',
        'empId',
        'idOrpd',
        'orpdPrdCod',
        'orpdPrdDes',
        'orpdCant',
        'orpdCantDis',
        'orpdTotP',
        'orpdObs'
    ];
}
