<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenProduccion extends Model
{
    use HasFactory;

    protected $table    ='ord_produccion';
    protected $fillable = [
        'idOrp',
        'empId',
        'idPrv',
        'orpNumOc',
        'orpNumRea',
        'orpFech',
        'orpUsrG',
        'orpObs',
        'orpTurns',
        'orpEst',
        'orpEstPrc'
    ];

}
