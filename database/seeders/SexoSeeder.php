<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'descripcion' => 'Masculino',
        ]);
        DB::table('roles')->insert([
            'descripcion' => 'Femenino',
        ]);
        DB::table('roles')->insert([
            'descripcion' => 'X',
        ]);
    }
}
