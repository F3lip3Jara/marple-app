<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovRechazo extends Model
{
    use HasFactory;

    protected $table    ='mot_rechazo';
    protected $fillable = [
        'idMot',
        'empId',
        'motDes'
    ];

}
