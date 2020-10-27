<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        User::truncate();
        
        $faker = \Faker\Factory::create();
        
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123123');
        
        User::create([
            'name'=> 'Registro',
            'lastname'=>'Almuerzo',
            'email'=> 'registro@prueba.com',
            'password'=> $password,
            ]);
            
        // Generar algunos usuarios para nuestra aplicacion
            
        for($i = 0; $i < 2; $i++) {
            User::create([
                'name'=> $faker->firstName,
                'lastname'=>$faker->lastName,
                'email'=> $faker->email,
                'password'=> $password,
                ]);
            }
   }
}
