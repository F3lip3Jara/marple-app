<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mezcla extends Model
{
    use HasFactory;

    protected $table    ='mezcla';
    protected $fillable = [
        'idMez',
        'empId',
        'mezUsu',
        'mezLotSal',
        'mezKil',
        'mezTip',
        'mezEst',
        'mezEstCtl',
        'mezMaq',
        'mezidEta',
        'mezprdCod',
        'mezidPrd',
        'mezprdDes',
        'mezTurn',
        'mezObs'
    ];
}
