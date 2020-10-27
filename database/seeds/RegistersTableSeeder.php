<?php

use App\RegisterLunch;
use Illuminate\Database\Seeder;

class RegistersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegisterLunch::truncate();
        
        $faker = \Faker\Factory::create();
        
       
        // Generar algunos empleados para nuestra aplicacion
            
        for($i = 0; $i < 20; $i++) {
            RegisterLunch::create([
                'checkIn'=> $faker->time($format = 'H:i:s', $start='now', $max='-2 hours', $timezone = 'America/Guayaquil'),
                'checkOut'=>$faker->time($format = 'H:i:s', $start='now',$max='+2 hours', $timezone = 'America/Guayaquil'),
                ]); 
            }
        }
}
