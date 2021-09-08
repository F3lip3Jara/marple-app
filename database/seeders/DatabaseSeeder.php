<?php

namespace Database\Seeders;

use App\Models\producto;
use App\Models\Roles;
use App\Models\User;
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
            
          User::create([
            'name'       => 'felipe',
            'email'      => 'felipe@agiliteticl.com',         
             'idRol'     => 1,
             'activado'  => 'A',
             'imgName'   => '',
             'token'     => '',
             'password'  => bcrypt('felipe')
        ]);   
      
    }
}
