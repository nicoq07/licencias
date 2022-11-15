<?php

namespace Database\Seeders;

use App\Models\Persona;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Persona::factory(500)->create();
        DB::table('personas')->insert([
            'nombre' => "Nicolás",
            'apellido' => 'Quiroga',
            'documento' => 38776090,
            'fecha_nacimiento' => Carbon::now()->addYears(-18)->toDateTimeString(),
            'utiliza_anteojos' => 0,
            'sexo_id' => 1,
            'grupo_sanguineo_id' => 2,
            'tipo_documento_id' => 1
        ]);
    }
}
