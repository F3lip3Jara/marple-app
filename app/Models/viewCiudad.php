<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewCiudad extends Model
{
    use HasFactory;

    protected $table    ='ciudades';

    protected $fillable = [
       'idPai',
       'paiDes',
       'paicod',
       'idReg',
       'regCod',
       'regDes',
       'ciuDes',
       'ciuCod',
       'idCiu'


        ];
}
