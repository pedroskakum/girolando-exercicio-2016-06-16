<?php

use Illuminate\Database\Seeder;
use Segundo\Models\Usuario;


class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::truncate();
        factory('Segundo\Models\Usuario', 5)->create();

    }
}