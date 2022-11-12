<?php

namespace App\Services;

use App\Models\Pregunta;
use App\Models\Respuesta;

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
}
