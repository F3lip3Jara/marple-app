<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

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

   public function getCreatedAtAttribute($value){
       return Carbon::createFromTimestamp(strtotime($value))
       ->timezone(Config::get('app.timezone'))
       ->toDateTimeString();
   }
       
   public function getUpdatedAtAttribute($value){
       return Carbon::createFromTimestamp(strtotime($value))
       ->timezone(Config::get('app.timezone'))
       ->toDateTimeString();
   }
}
