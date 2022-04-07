<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioJul extends Model
{
    use HasFactory;
    protected $table    ='calendario_jul';
    protected $fillable = [
        'idCal',
        'empId',
        'calMes',
        'calDia',
        'calAno',
        'calMesDes',
        'calValor'

    ];
}
