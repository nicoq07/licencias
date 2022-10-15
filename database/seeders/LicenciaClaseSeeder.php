<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenciaClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('licencia_clases')->insert([
            'descripcion' => 'A1',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'A2',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'A3',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'B1',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'B2',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'C1',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'C2',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'C3',
            'profesional' => false,
        ]);

        DB::table('licencia_clases')->insert([
            'descripcion' => 'D1',
            'profesional' => true,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'D2',
            'profesional' => true,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'D3',
            'profesional' => true,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'D4',
            'profesional' => true,
        ]);

        DB::table('licencia_clases')->insert([
            'descripcion' => 'E1',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'E2',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'F',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'G1',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'G2',
            'profesional' => false,
        ]);
        DB::table('licencia_clases')->insert([
            'descripcion' => 'G3',
            'profesional' => false,
        ]);
    }
}
