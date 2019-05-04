<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // (|:
        // ]: Ejecuta el factory
        factory(User::class, 29)->create();

        // ]: Usuario admin
        User::create([
        	'name' => 'Jeix T',
        	'email' => 'jeix.t01@gmail.com',
        	'password' => bcrypt('321')
        ]);
    }
}
