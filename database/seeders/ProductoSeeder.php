<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10000000; $i++) {
            Producto::create([

                'prdDes'  => $faker->ean13,
                'cantidad'=>$faker->randomDigit,
                'marca'   => 1

            ]);
        }


    }
}
