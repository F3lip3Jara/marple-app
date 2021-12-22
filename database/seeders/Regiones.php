<?php

namespace Database\Seeders;

use App\Models\Pais;
use App\Models\Region;
use Illuminate\Database\Seeder;

class Regiones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = file_get_contents("database/data/Paises.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
             Pais::create([
                'paiCod' => $obj->iso2,
                'paiDes' => strtoupper($obj->nombre),
                'empId'  => 1
            ]);
        }


        $json = file_get_contents("database/data/Regiones.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          $id =0;
          $id = Pais::select('idPai')->where(['paiCod'=> $obj->cod_pai])->get();

            foreach($id as $xid){


                Region::create([
                    'idPai' => $xid->idPai,
                    'empId'  => 1,
                    'regCod' => $obj->cod_reg,
                    'regDes'  => mb_strtoupper($obj->desreg, "UTF-8")
                ]);
            }

        }


    }
}
