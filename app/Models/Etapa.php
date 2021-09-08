<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;
    protected $table    ='etapasuser';
    protected $fillable = [
        'idEta',
        'etaDes'
    ];
}
