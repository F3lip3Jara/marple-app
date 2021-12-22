<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table    ='producto';
    protected $fillable = [
        'idPrd',
        'prdCod',
        'prdDes',
        'prdObs',
        'prdRap',
        'prdEan',
        'prdTip',
        'prdCost',
        'prdNet',
        'prdBrut',
        'prdInv',
        'prdPes',
        'prdMin',
        'idMon',
        'idGrp',
        'idSubGrp',
        'idUn',
        'idCol'
    ];
}
