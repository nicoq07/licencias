<?php

namespace App\Services;

use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Carbon\Carbon;

class PreguntaService
{
    public function store($data)
    {
        $respuesta =  Respuesta::firstOrNew(['id' => $data['respuesta_id']]);
        $respuesta->descripcion = $data['respuesta_descripcion'];

        if ($respuesta->save()) {

            $pregunta = Pregunta::firstOrNew(['id' => $data['pregunta_id']]);
            $pregunta->descripcion = $data['pregunta_descripcion'];
            $pregunta->respuesta_id = $respuesta->id;
            return $pregunta->save();
        } else {
            return false;
        }
    }

    public function getPreguntas()
    {
        return Pregunta::with(['Respuesta'])->get();
    }

    public function aleatorizarPreguntas(Examen &$examen): Examen
    {
        $i = 1;
        foreach (Pregunta::inRandomOrder()->limit(10)->get() as $pregunta) {
            $examen->preguntas()->attach($pregunta->id, [
                'orden' => $i,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            $i++;
        }

        return $examen;
    }
}
