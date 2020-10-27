<?php

use App\Payroll;
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
        Payroll::truncate();
        
        $faker = \Faker\Factory::create();
        
       
        // Generar algunos empleados para nuestra aplicacion
            
        for($i = 0; $i < 10; $i++) {
            Payroll::create([
                'name'=> $faker->firstName,
                'lastname'=>$faker->lastName,
                'identification'=> $faker->isbn10,
                ]);
            }
        }
 }
