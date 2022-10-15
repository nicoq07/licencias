<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSanguineoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => 'A+',
        ]);
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => 'A-',
        ]);
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => 'B+',
        ]);
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => 'B-',
        ]);
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => 'AB+',
        ]);
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => 'AB-',
        ]);
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => '0+',
        ]);
        DB::table('grupos_sanguineos')->insert([
            'descripcion' => '0-',
        ]);
    }
}
