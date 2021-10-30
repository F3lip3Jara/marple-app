<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
