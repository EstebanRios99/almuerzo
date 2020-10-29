<?php

use App\Employ;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
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
        $users = User::all();

        // Generar algunos empleados para nuestra aplicacion por cada usuario
        foreach ($users as $user){
            JWTAuth::attempt(['email' => $users->email, 'password' => '123123']);
            for($i = 0; $i < 4; $i++) {
                Employ::create([
                    'name'=> $faker->firstName,
                    'lastname'=>$faker->lastName,
                    'identification'=> $faker->isbn10,
                ]);
            }
        } 
    }
 }
