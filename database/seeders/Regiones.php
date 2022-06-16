<?php

namespace Database\Seeders;

use App\Models\Pais;
use App\Models\Region;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class Regiones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $headers = [
            'Accept'    => 'application/json',
            "api-token" => "drPBKMTX1GevwJgkVqj6lq4PrMV9RcfMW5CjlC4Nf0HiswQu_tX596ptjc4wnBrqmws",
            "user-email"=> "jrfelipe@hotmail.com"
        ];


        $client = new Client([
            'base_uri'=> 'https://www.universal-tutorial.com/api/',
            'headers' =>  $headers
        ]);

        $request    = $client->request('GET', 'getaccesstoken' );
        $auth_token = json_decode($request->getBody()->getContents());

        foreach($auth_token as $item){
           $token = $item;
        }

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $token,

        ];

        $client2 = new Client([
            'base_uri'=> 'https://www.universal-tutorial.com/api/',
            'headers' =>  $headers
        ]);

        $request2    = $client2->request('GET', 'countries/' );
        $data       = json_decode($request2->getBody()->getContents());

        foreach ($data as $obj) {
             Pais::create([
                'paiCod' => $obj->country_short_name,
                'paiDes' => mb_strtoupper($obj->country_name , 'UTF-8'),
                'empId'  => 1
            ]);
        }

        $paises = Pais::all();

        foreach($paises as $pais){
            $request3    = $client2->request('GET', 'states/'.$pais->paiDes );
            $regiones        = json_decode($request3->getBody()->getContents());
            foreach($regiones as $region){
                Region::create([
                    'idPai' => $pais->idPai,
                    'empId'  => 1,
                    'regDes' => $region->state_name,
                    'regCod' => 'A'
                ]);
            }
        }
    }
}
