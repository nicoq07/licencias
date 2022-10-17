<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'persona_id' => 1,
            'nombre_usuario' => 'test1',
            'email' => 'test1@gmail.com',
            'rol_id' => 2,
            'activo' => true,
            'created_at' => Carbon::now(),
        ]);
        DB::table('usuarios')->insert([
            'persona_id' => 2,
            'nombre_usuario' => 'test2',
            'email' => 'test2@gmail.com',
            'rol_id' => 2,
            'activo' => true,
            'created_at' => Carbon::now(),
        ]);
        DB::table('usuarios')->insert([
            'persona_id' => 3,
            'nombre_usuario' => 'test3',
            'email' => 'test3@gmail.com',
            'rol_id' => 2,
            'activo' => true,
            'created_at' => Carbon::now(),
        ]);
        DB::table('usuarios')->insert([
            'persona_id' => 4,
            'nombre_usuario' => 'test4',
            'email' => 'test4@gmail.com',
            'rol_id' => 2,
            'activo' => true,
            'created_at' => Carbon::now(),
        ]);
    }
}
