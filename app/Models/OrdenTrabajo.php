<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $table    ='ord_trabajo';
    protected $fillable = [
        'idOrdt',
        'empId',
        'idOrp',
        'orptFech',
        'orptUsrG',
        'orptTurns',
        'orptEst',
        'orptPrio'
    ];
}
