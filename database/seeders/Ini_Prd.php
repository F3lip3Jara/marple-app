<?php

namespace Database\Seeders;

use App\Models\Pais;
use App\Models\Producto;
use Faker\Core\File;
use Illuminate\Database\Seeder;

class Ini_Prd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = file_get_contents("database/data/Materiales.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Producto::create([
                'prdEan'   => $obj->prdEan,
                'prdCod'   => $obj->prdCod,
                'prdDes'   => $obj->prdDes,
                'prdObs'   => $obj->prdObs,
                'prdRap'   => substr($obj->prdCod , 0 , 6),
                'prdTip'   => $obj->prdTip,
                'prdCost'  => 1,
                'prdNet'   => 1,
                'prdBrut'  => 1,
                'prdInv'   => 'S',
                'prdPes'   => 1,
                'prdMin'   => 1,
                'idMon'    => $obj->idMon,
                'idGrp'    => $obj->idGrp,
                'idSubGrp' => $obj->idSubGrp,
                'idUn'     => $obj->idUn,
                'idCol'    => $obj->idCol
            ]);
        }


    }
}
