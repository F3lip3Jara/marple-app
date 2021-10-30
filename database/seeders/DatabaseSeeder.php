<?php

namespace Database\Seeders;

use App\Models\producto;
use App\Models\Roles;
use App\Models\User;
use App\Models\Empresa;
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


    }
}
