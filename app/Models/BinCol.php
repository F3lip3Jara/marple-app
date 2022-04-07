<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinCol extends Model
{
    use HasFactory;

    protected $table    ='bins_col';
    protected $fillable = [
        'idColb',
        'empId',
        'colbnum'
    ];
}
