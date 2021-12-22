<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMed extends Model
{
    use HasFactory;

    protected $table    ='un_medida';
    protected $fillable = [
        'idUn',
        'empId',
        'unDes',
        'unCod'
    ];
}
