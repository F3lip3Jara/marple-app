<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;
    protected $table    ='comuna';
    protected $fillable = [
        'idPai',
        'empId',
        'idReg',
        'idCiu',
        'idCom',
        'comDes',
        'comCod'
    ];
}
