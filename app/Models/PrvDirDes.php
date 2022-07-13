<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class PrvDirDes extends Model
{
    use HasFactory;
    protected $table    ='prv_dir_des';
    protected $fillable = [
        'empId',
        'idPrv',
        'idPrvd',
        'prvdDir',
        'prvdNum',
        'idPai',
        'idReg',
        'idCom',
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
