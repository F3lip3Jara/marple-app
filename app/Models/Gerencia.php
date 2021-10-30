<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    use HasFactory;

    protected $table    ='gerencia';
    protected $fillable = [
        'gerId',
        'gerDes',
        'empId'
    ];
}
