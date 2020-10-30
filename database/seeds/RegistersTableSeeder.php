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
        $checkIn = '13:05:00';
        $checkOut = '13:55:00';
        
       
        // Generar registro para cada empleado
        foreach ($employs as $employ){
            for($i = 0; $i < 1; $i++) {
                Register::create([
                    'checkIn'=> $checkIn,
                    'checkOut'=>$checkOut,
                    'employ_id'=>$employ->id,
                ]); 
            }
        }
    }
}
