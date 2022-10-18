<?php

namespace App\Services;

use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\PreguntaExamen;

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
                'orden' => $i
            ]);
            $i++;
        }

        $examen->save();
    }

    public function obtenerPreguntaPorTokenOrden($token, $orden)
    {
        $usuario = $this->tokenUsuarioService->obtenerUsuarioPorToken($token);
        $examen = Examen::whereActivo(true)->whereUsuarioId($usuario->id)->latest('intento')->get()->first();
        $preguntas = $examen->preguntas();
        print_r($preguntas->first());
        $pregunta = PreguntaExamen::where('examen_id', '=', $examen->id)->where('orden', '=', $orden);
    }
}
