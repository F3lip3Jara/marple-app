<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Empleado extends Model
{
    use HasFactory;
    protected $table    ='empleados';
    protected $fillable = [
        'idEmplo',
        'id',
        'emploNom',
        'emploApe',
        'emploFecNac',
        'emploAvatar',
        'empId',
        'gerId'
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
