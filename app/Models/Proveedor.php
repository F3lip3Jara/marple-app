<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table    ='proveedor';
    protected $fillable = [
        'idPrv',
        'prvRut',
        'prvNom',
        'prvNom2',
        'prvGiro',
        'prvNum',
        'prvDir',
        'prvTel',
        'prvCli',
        'prvPrv',
        'prvMail',
        'idPai',
        'idReg',
        'idCom',
        'idCiu',
        'empId',
        'prvAct'

    ];
}
