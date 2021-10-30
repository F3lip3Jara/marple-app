<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewUser extends Model
{
    use HasFactory;

    protected $table    ='usuarios';

    protected $fillable = [
        'token',
        'name',
        'email',
        'emploAvatar',
        'idRol',
        'rolDes',
        'emploNom',
        'emploApe',
        'emploFecNac',
        'emplofecIng',
        'gerId',
        'gerDes',
        'reinicio',
        'activado',
        'created_at',
        'id'

    ];
}
