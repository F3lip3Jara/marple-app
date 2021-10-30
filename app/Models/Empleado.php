<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table    ='empleados';
    protected $fillable = [
        'idEmplo',
        'id',
        'emploNom',
        'emploApe',
        'emploFecNac',
        'emploAvatar',
        'empId',
        'gerId'
    ];
}
