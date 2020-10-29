<?php

use App\Register;
use App\Employ;
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
        Register::truncate();
        
        $faker = \Faker\Factory::create();
        $employs = Employ::all();
        
       
        // Generar registro para cada empleado
        foreach ($employs as $employ){
            for($i = 0; $i < 1; $i++) {
                Register::create([
                    'checkIn'=> $faker->time($format = 'H:i:s', $start='now', $max='-2 hours', $timezone = 'America/Guayaquil'),
                    'checkOut'=>$faker->time($format = 'H:i:s', $start='now',$max='+2 hours', $timezone = 'America/Guayaquil'),
                ]); 
            }
        }
    }
}
