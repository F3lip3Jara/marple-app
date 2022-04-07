<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MezclaDet extends Model
{
    use HasFactory;
    protected $table    ='mezcla_det';
    protected $fillable = [
        'idMez',
        'empId',
        'idMezd',
        'mezdidPrd',
        'mezdprdCod',
        'mezdprdTip',
        'mezdprdDes',
        'mezdLotIng',
        'mezdUso',
        'mezdKil'
    ];
}
