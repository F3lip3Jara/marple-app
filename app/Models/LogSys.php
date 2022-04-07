<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSys extends Model
{
    use HasFactory;
    protected $table    ='log_sys';
    protected $fillable = [
        'idLog',
        'empId',
        'idEta',
        'idEtaDes',
        'lgId',
        'lgName',
        'lgDes',
        'lgTip',
        'lgDes1',
        'lgDes2',
        'lgDes3',
        'lgDes4',
    ];
}
