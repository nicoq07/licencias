<?php

namespace App\Services;

use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\PreguntaExamen;
use App\Models\Respuesta;
use Carbon\Carbon;

class ExamenService
{
    private $tokenUsuarioService;

    function __construct()
    {
        $this->tokenUsuarioService = new TokenUsuarioService();
    }


    public function iniciarExamen($usuario_id)
    {
        $examen = new Examen();
        $examen->usuario_id = $usuario_id;
        $examen->activo = true;
        $examen->save();

        $i = 1;
        foreach (Pregunta::inRandomOrder()->limit(10)->get() as $pregunta) {
            $examen->preguntas()->attach($pregunta->id, [
                'orden' => $i,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            $i++;
        }

        $examen->save();
    }

    public function obtenerPreguntaPorTokenOrden($token, $numero_pregunta)
    {
        $usuario = $this->tokenUsuarioService->obtenerUsuarioPorToken($token);
        $examen = Examen::whereActivo(true)->whereUsuarioId($usuario->id)->latest('intento')->get()->first();
        $pregunta = $examen->preguntaPorNumero($numero_pregunta);
        $respuestaCorrecta = Respuesta::whereId($pregunta->respuesta_id)->first();
        $respuestas = null;
        foreach (Respuesta::where('id', '<>', $pregunta->respuesta_id)->inRandomOrder()->limit(3)->get() as $r) {
            $respuestas[$r->id] = [$r->id => $r->descripcion];
        }
        $respuestas[$respuestaCorrecta->id] = [$respuestaCorrecta->id => $respuestaCorrecta->descripcion];
        shuffle($respuestas);
        $examen->updated_at = Carbon::now()->toDateTimeString();
        $examen->save();
        return ['pregunta' => $pregunta->descripcion, 'opciones' => $respuestas];
    }

    public function responderPreguntaPorTokenOrden($token, $numero_pregunta, $respuesta_id)
    {
        $usuario = $this->tokenUsuarioService->obtenerUsuarioPorToken($token);
        $examen = Examen::whereActivo(true)->whereUsuarioId($usuario->id)->latest('intento')->get()->first();
        $examen->updated_at = Carbon::now()->toDateTimeString();
        $pregunta = $examen->preguntaPorNumero($numero_pregunta);
        $respuestaOk = true;
        if ($pregunta->respuesta_id != $respuesta_id) {
            $respuestaOk = false;
        }
        $examen->preguntas()->updateExistingPivot($pregunta->id, ['resultado_al_responder' => $respuestaOk, 'updated_at' => Carbon::now()->toDateTimeString()]);
        $examen->save();
        return $pregunta;
    }

    public function generarUrlProximoPaso($token, $preguntalActual)
    {
        $url = null;
        if ($preguntalActual == 10) {
            $url = ['resultado' => url("api/examen/$token/resultado")];
        } else {
            $siguiente = intval($preguntalActual) + 1;
            $url = ['siguientePregunta' => url("api/examen/$token/$siguiente")];
        }

        return $url;
    }
}
