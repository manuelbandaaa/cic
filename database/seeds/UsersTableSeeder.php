<?php

use Illuminate\Database\Seeder;
use App\Position;
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
        Position::create([
        	'name' => 'Administrador'
        ]);

        Position::create([
        	'name' => 'Supervisor'
        ]);

        Position::create([
        	'name' => 'Becario'
        ]);

        Position::create([
        	'name' => 'Aspirante'
        ]);
    }
}
