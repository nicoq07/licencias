<?php

namespace App\Services;

use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\PreguntaExamen;
use App\Models\Respuesta;
use App\Models\TokenUsuario;
use Carbon\Carbon;
use Exception;
use PhpParser\Node\Expr\Throw_;

class ExamenService
{
    private $tokenUsuarioService;

    function __construct()
    {
        $this->tokenUsuarioService = new TokenUsuarioService();
    }


    public function iniciarExamen($usuario_id, PreguntaService $preguntaService)
    {
        $intento = $this->obtenerUltimoIntento($usuario_id);
        if ($intento >= 3) throw new Exception("Ya no posee intentos de Exámen.");
        $examen = new Examen();
        $examen->usuario_id = $usuario_id;
        $examen->activo = true;
        $examen->intento = $intento;
        $examen->save();

        // $i = 1;
        // foreach (Pregunta::inRandomOrder()->limit(10)->get() as $pregunta) {
        //     $examen->preguntas()->attach($pregunta->id, [
        //         'orden' => $i,
        //         'created_at' => Carbon::now()->toDateTimeString(),
        //         'updated_at' => Carbon::now()->toDateTimeString(),
        //     ]);
        //     $i++;
        // }

        $examen = $preguntaService->aleatorizarPreguntas($examen);

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
            $respuestas[$respuestaCorrecta->id] = [$respuestaCorrecta->id => $respuestaCorrecta->descripcion];
        }
        shuffle($respuestas);
        $examen->updated_at = Carbon::now()->toDateTimeString();
        $examen->save();
        return ['pregunta' => $pregunta->descripcion, 'opciones' => $respuestas];
    }

    public function responderPreguntaPorTokenOrden($token, $numero_pregunta, $respuesta_id)
    {
        $usuario = $this->tokenUsuarioService->obtenerUsuarioPorToken($token);
        $examen = Examen::whereActivo(true)->whereUsuarioId($usuario->id)->latest('intento')->get()->first();
        if ($examen) {
            $examen->updated_at = Carbon::now()->toDateTimeString();
            $pregunta = $examen->preguntaPorNumero($numero_pregunta);
            $respuestaOk = true;
            if ($pregunta->respuesta_id != $respuesta_id) {
                $respuestaOk = false;
            }
            $examen->preguntas()->updateExistingPivot($pregunta->id, ['resultado_al_responder' => $respuestaOk, 'updated_at' => Carbon::now()->toDateTimeString()]);
            $examen->save();
            return $pregunta;
        } else {
            return false;
        }
    }

    public function generarUrlProximoPaso($token, $preguntalActual)
    {
        $url = null;
        if ($preguntalActual == 10) {
            $url = $this->generarResultado($token);
        } else {
            $siguiente = intval($preguntalActual) + 1;
            $url = ['siguientePregunta' => url("api/examen/?token=$token&numero_pregunta=$siguiente")];
        }

        return $url;
    }

    public function obtenerExamenFinalizado($id)
    {
        $examen = Examen::whereActivo(false)
            ->whereId($id)
            ->where('nota', '<>', null)
            ->latest('intento')
            ->get()
            ->first();
        if (!$examen) {
            throw new Exception("No puede acceder a ese examen.");
        }
        if ($examen->nota >= 8) {
            return [
                'mensaje'  => 'Exámen aprobado, su nota es: ' . $examen->nota
            ];
        } else {
            if ($this->obtenerUltimoIntento($examen->usuario_id) < 3) {
                return [
                    'mensaje'  => 'Exámen desaprobado, puede hacer un nuevo exámen.'
                ];
            } else {
                return [
                    'mensaje'  => 'Exámen desaprobado, no tiene mas intentos para realizarlo.'
                ];
            }
        }
    }

    public function generarResultado($token)
    {
        $usuario = $this->tokenUsuarioService->obtenerUsuarioPorToken($token);
        $examen = Examen::whereActivo(true)->whereUsuarioId($usuario->id)->latest('intento')->get()->first();
        $nota = 0;
        foreach ($examen->preguntas()->get() as $pregunta) {
            $nota += ($pregunta->pivot->resultado_al_responder == 1) ? 1 : 0;
        }
        $examen->nota = $nota;
        $examen->activo = false;
        $examen->fecha = Carbon::now()->toDateTimeString();
        $examen->save();

        TokenUsuario::whereToken($token)->get()->first()->delete();

        if ($examen->nota >= 8) {
            $lS = new LicenciaService();
            $licencia = $lS->generarLicencia($usuario->id, $examen->id);
            return [
                'mensaje'  => 'Examen aprobad, su nota es : ' . $examen->nota . '\n Puede visualizar su licencia aquí:',
                'url'  => url("licencias/" . $usuario->id . "/" . $licencia->id)
            ];
        } else {
            return $this->obtenerExamenFinalizado($examen->id);
        }
    }

    public function obtenerUltimoIntento($usuario_id): int
    {
        if ($examen = Examen::whereUsuarioId($usuario_id)->latest('intento')->get()->first()) {
            return $examen->intento + 1;
        } else {
            return 1;
        }
    }

    public function reporte()
    {
        $examenesAprobados = Examen::where('nota', '>=', 8)->where('fecha', '<>', null)->get()->count();
        $examenesDesaprobados = Examen::where('nota', '<=', 7)->where('fecha', '<>', null)->get()->count();
        $examenAbandonados = Examen::where('fecha', '=', null)->get()->count();
        $examenesTotales = Examen::all()->count();

        $porcentajeAprobados = round(($examenesAprobados / $examenesTotales) * 100, 2);
        $porcentajeDesaprobados = round(($examenesDesaprobados / $examenesTotales) * 100, 2);
        $porcentajeAbandonados = round(($examenAbandonados / $examenesTotales) * 100, 2);

        return [
            'examenesAprobados' => $examenesAprobados  . "(" . $porcentajeAprobados . "%)",
            'examenesDesaprobados' => $examenesDesaprobados . "(" . $porcentajeDesaprobados . "%)",
            'examenAbandonados' => $examenAbandonados . "(" . $porcentajeAbandonados . "%)",
            'examenesTotales' => $examenesTotales,
        ];
    }
}
