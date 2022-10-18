<?php

namespace App\Http\Controllers;

use App\Services\ExamenService;
use App\Services\PersonaService;
use App\Services\UsuarioService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class ExamenController extends Controller
{
    //

    public function cuestionarioInicial(
        Request $request,
        UsuarioService $usuarioService,
        ExamenService $examenService,
        PersonaService $personaService
    ) {
        $validator = Validator::make($request->all(), [
            'tipo_documento_id' => 'bail|required',
            'documento' => 'required|numeric',
            'utiliza_anteojos' => 'required'
        ]);
        if ($validator->fails()) {
            return response(
                [
                    'errors' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ]
            );
        }
        try {
            $documento = $request->get('documento');
            $tipo_documento_id = $request->get('tipo_documento_id');
            $utiliza_anteojos = $request->get('utiliza_anteojos');
            $persona = $personaService->obtenerPersonaPorDocummentoTipoDocumento(documento: $documento, tipo_documento_id: $tipo_documento_id);
            $usuario = $usuarioService->obtenerUsuarioPorPersonaId(persona_id: $persona->id);
            //ver si utiliza anteojos y actualizar en la clasePersona
            //Si utiliza generar un turno para una revision

            if ($request->get('utiliza_anteojos')) {
                $persona = $personaService->actualizarUtilizaAnteojos(persona_id: $persona->id, utiliza_anteojos: $utiliza_anteojos);
                $turno = $usuarioService->generarTurno($usuario->id);
                return response([
                    'mensaje' => 'Usted posee un turno para revisión ocular:',
                    'dia_hora' => $turno->fecha,
                    'Numero de turno' => $turno->id
                ], 201);
            } else {
                $token = $usuarioService->generarTokenUsuario(usuario_id: $usuario->id);
                return response([
                    'mensaje' => 'Puede iniciar el examen, conserve el siguiente token (1 hora de validez) :',
                    'token' => $token->token,
                    'expira' => $token->expires_at
                ]);
            }
        } catch (Exception $error) {
            return response([$error->getMessage(), $error->getTraceAsString()], 500);
        }
    }
    /**
     * muestra el resultado del examen
     */
    public function show(Request $request, $orden, $token, ExamenService $examenService)
    {
        $pregunta = $examenService->obtenerPreguntaPorTokenOrden($token, $orden);
        return response(
            ['pregunta' => $pregunta->descripcion],
            200
        );
    }

    /**
     * recibe la respuesta de la pregunta 
     */
    public function doCuestionario(Request $request, ExamenService $examenService)
    {
        $validator = Validator::make($request->all(), [
            'respuesta_id' => 'bail|required',
            'token' => 'required',
            'numero_pregunta' => 'required'
        ]);
        if ($validator->fails()) {
            return response(
                [
                    'errors' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ]
            );
        }
        $token = $request->get('token');
        $respuesta_id = $request->get('respuesta_id');
        $numero_pregunta = $request->get('numero_pregunta');

        $pregunta = $examenService->responderPreguntaPorTokenOrden($token, $numero_pregunta, $respuesta_id);
        return response(
            ['pregunta' => $pregunta->descripcion],
            200
        );
    }
}
