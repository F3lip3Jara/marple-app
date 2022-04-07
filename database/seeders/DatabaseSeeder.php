<?php

namespace Database\Seeders;

use App\Models\BinCol;
use App\Models\Ciudad;
use App\Models\Color;
use App\Models\Comuna;
use App\Models\producto;
use App\Models\Roles;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Etapa;
use App\Models\EtapaDes;
use App\Models\Grupo;
use App\Models\Moneda;
use App\Models\Pais;
use App\Models\Region;
use App\Models\SubGrupo;
use App\Models\UnidadMed;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'idRol' => 1,
            'rolDes' =>'ADMINISTRADOR'
          ]);

          User::create([
              'name'       => 'ADMINISTRADOR',
              'email'      => 'adm@contacto.cl',
               'idRol'     => 1,
               'activado'  => 'A',
               'imgName'   => '',
               'token'     => '',
               'password'  => bcrypt('admin')
          ]);


        Empresa::create([
            'empId'  => 1,
            'empDes'  =>'MARPLE PLASTIC SOLUTION GROUP S.A.',
            'empDir'  =>'Santa Marta N°1051 Maipú - Santiago',
            'empRut'  =>'76.350.147-7',
            'empGiro' =>'Fabricación y Comercialización de Artículos de Plástico',
            'empFono' => '(02) 25308702'
          ]);

        Moneda::create([
            'monCod' => 'CLP',
            'monDes' => 'PESO CHILENO',
            'empId'  =>1
        ]);

        Color::create([
            'colCod' => 'BLC',
            'colDes' => 'BLANCO',
            'empId'  =>1
        ]);

        Grupo::create([
            'grpCod' => 'BLS',
            'grpDes' => 'BOLSAS',
            'empId'  =>1
        ]);

        SubGrupo::create([
            'idGrp' => 1,
            'empId'  => 1,
            'grpsCod' => 'BLSM',
            'grpsDes'  => 'CAMISETAS'
        ]);

        UnidadMed::create([
            'unCod' => 'MT3',
            'unDes' => 'METRO CÚBICO',
            'empId'  =>1
        ]);

        BinCol::create([
            'empId'   => 1,
            'colbnum' => 400
        ]);


        Etapa::create(['etaDes' => 'SEGURIDAD' ,
                       'etaProd'=> 'N']);

        Etapa::create(['etaDes' => 'PARAMETROS' ,
                       'etaProd'=> 'N']);

        Etapa::create(['etaDes' => 'MEZCLA' ,
                       'etaProd'=> 'S']);


        //1-1
        EtapaDes::create([
                        'idEta' =>1,
                        'etaDesDes' =>'LOGEO DE USUARIO',
                        'etaDesDel' => 'N'
                    ]);
        //1-2
        EtapaDes::create([
                        'idEta' =>1,
                        'etaDesDes' =>'INGRESO DE USUARIO',
                        'etaDesDel' => 'N'
                    ]);
        //1-3
         EtapaDes::create([
                        'idEta' =>1,
                        'etaDesDes' =>'REINICIO DE USUARIO',
                        'etaDesDel' => 'N'
                    ]);
        //1-4
         EtapaDes::create([
                        'idEta' =>1,
                        'etaDesDes' =>'DESHABILITAR USUARIO',
                        'etaDesDel' => 'N'
                    ]);
        //1-5
        EtapaDes::create([
                        'idEta' =>1,
                        'etaDesDes' =>'HABILITAR USUARIO',
                        'etaDesDel' => 'N'
                    ]);
        //1-6
        EtapaDes::create([
            'idEta' =>1,
            'etaDesDes' =>'INGRESAR ROL',
            'etaDesDel' => 'N'
        ]);
        //1-7
        EtapaDes::create([
                        'idEta' =>1,
                        'etaDesDes' =>'ACUALIZAR ROL',
                        'etaDesDel' => 'N'
                    ]);
         //1-8
        EtapaDes::create([
                        'idEta' =>1,
                        'etaDesDes' =>'ELIMINAR ROL',
                        'etaDesDel' => 'N'
                    ]);

        EtapaDes::create([
                        'idEta' =>2,
                        'etaDesDes' =>'INGRESO  ETAPA',
                        'etaDesDel' => 'N'
                    ]);
        EtapaDes::create([
                        'idEta' =>2,
                        'etaDesDes' =>'ACTUALIZAR ETAPA',
                        'etaDesDel' => 'N'
                    ]);
        EtapaDes::create([
                        'idEta' =>2,
                        'etaDesDes' =>'ELIMINAR ETAPA',
                        'etaDesDel' => 'N'
                    ]);

         EtapaDes::create([
                    'idEta' =>3,
                    'etaDesDes' =>'INGRESO DE MEZCLA',
                    'etaDesDel' => 'N'
        ]);
    }
}
