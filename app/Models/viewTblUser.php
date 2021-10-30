<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewTblUser extends Model
{
    use HasFactory;
    protected $table    ='tblusuarios';

    protected $fillable = [
        'id',
        'name',
        'email',
        'rolDes',
        'emploNom',
        'emploApe',
        'emploFecNac',
        'gerDes',
        'activado',
        'reinicio',
        'created_at'

    ];

}
