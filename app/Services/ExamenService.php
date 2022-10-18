<?php

namespace App\Services;

use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\PreguntaExamen;
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
        $examen->updated_at = Carbon::now()->toDateTimeString();
        $examen->save();
        return $pregunta;
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
}
