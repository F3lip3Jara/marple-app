<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGrupo extends Model
{
    use HasFactory;

    protected $table    ='sub_grupo';
    protected $fillable = [
        'idSubGrp',
        'empId',
        'idGrp',
        'grpsCod',
        'grpsDes'
    ];
}
