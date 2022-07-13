<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class viewUser extends Model
{
    use HasFactory;

    protected $table    ='usuarios';

    protected $fillable = [
        'token',
        'name',
        'email',
        'emploAvatar',
        'idRol',
        'rolDes',
        'emploNom',
        'emploApe',
        'emploFecNac',
        'emplofecIng',
        'gerId',
        'gerDes',
        'reinicio',
        'activado',
        'created_at',
        'id'

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
