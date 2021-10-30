<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewRegiones extends Model
{
    use HasFactory;

    protected $table    ='regiones';

    protected $fillable = [
       'idPai',
       'paiDes',
       'paicod',
       'idReg',
       'regCod',
       'regDes'

    ];
}
