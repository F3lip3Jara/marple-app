<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtapaDes extends Model
{
    use HasFactory;

    protected $table    ='etapasUserDes';
    protected $fillable = [
        'idEta',
        'idEtaDes',
        'etaDesDes',
        'etaDesDel'
    ];
}
