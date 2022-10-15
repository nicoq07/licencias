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
        DB::table('sexos')->insert([
            'descripcion' => 'Masculino',
        ]);
        DB::table('sexos')->insert([
            'descripcion' => 'Femenino',
        ]);
        DB::table('sexos')->insert([
            'descripcion' => 'X',
        ]);
    }
}
