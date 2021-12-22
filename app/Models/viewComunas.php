<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewComunas extends Model
{
    use HasFactory;
    protected $table    ='comunas';

    protected $fillable = [
       'idPai',
       'paiDes',
       'paicod',
       'idReg',
       'regCod',
       'regDes',
       'comCod',
       'idCom',
       'comDes',
       'idCiu',
       'ciuDes'

        ];
}
