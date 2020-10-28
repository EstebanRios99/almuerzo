<?php

use App\Employ;
use Illuminate\Database\Seeder;


class PayrollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        Employ::truncate();

        $faker = \Faker\Factory::create();


        // Generar algunos empleados para nuestra aplicacion

        for($i = 0; $i < 10; $i++) {
            Employ::create([
                'name'=> $faker->firstName,
                'lastname'=>$faker->lastName,
                'identification'=> $faker->isbn10,
                ]);
            }
        }
 }
