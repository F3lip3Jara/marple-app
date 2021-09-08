<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewUser extends Model
{
    use HasFactory;

    protected $table    ='usuarios';

    protected $fillable = [
        'toke',
        'name',
        'emial',
        'imgName',
        'idRol',
        'rolDes',
        'empNom',
        'empApe',
        'empFecNac'
    ];
}
