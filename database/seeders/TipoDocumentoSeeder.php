<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'descripcion' => 'D.N.I',
        ]);
        DB::table('roles')->insert([
            'descripcion' => 'L.C',
        ]);
        DB::table('roles')->insert([
            'descripcion' => 'L.E',
        ]);
        DB::table('roles')->insert([
            'descripcion' => 'C.I',
        ]);
    }
}
