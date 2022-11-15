<?php

namespace App\Http\Controllers;

use App\Traits\AuthorizationTokenTrait;
use App\Services\ExamenService;
use App\Services\PersonaService;
use App\Services\PreguntaService;
use App\Services\UsuarioService;
use App\Traits\AuthorizationAdminTrait;
use Carbon\Carbon;
use Database\Seeders\PreguntaSeeder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class ExamenController extends Controller
{

    use AuthorizationTokenTrait;
    use AuthorizationAdminTrait;

    public function cuestionarioInicial(
        Request $request,
        UsuarioService $usuarioService,
        PersonaService $personaService,
        PreguntaService  $preguntaService
    ) {
        $validator = Validator::make($request->post(), [
            'tipo_documento_id' => 'bail|required',
            'documento' => 'required|numeric',
            'utiliza_anteojos' => 'required'
        ]);
        if ($validator->fails()) {
            return response(
                [
                    'error' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        try {
            $documento = $request->post('documento');
            $tipo_documento_id = $request->post('tipo_documento_id');
            $utiliza_anteojos = $request->post('utiliza_anteojos');
            $persona = $personaService->obtenerPersonaPorDocummentoTipoDocumento(documento: $documento, tipo_documento_id: $tipo_documento_id, utiliza_anteojos: $utiliza_anteojos);
            $usuario = $usuarioService->obtenerUsuarioPorPersonaId(persona_id: $persona->id);
            //ver si utiliza anteojos y actualizar en la clasePersona
            //Si utiliza generar un turno para una revision

            if ($request->post('utiliza_anteojos')) {
                $usuarioService->borrarTokenUsuario($usuario->id, null);
                $persona = $personaService->actualizarUtilizaAnteojos(persona_id: $persona->id, utiliza_anteojos: $utiliza_anteojos);
                $turno = $usuarioService->generarTurno($usuario->id);
                return response([
                    'mensaje' => 'Usted posee un turno para revisión ocular:',
                    'dia_hora' => $turno->fecha,
                    'Numero de turno' => $turno->id
                ], Response::HTTP_CREATED);
            } else {

                $token = $usuarioService->generarTokenUsuario(usuario_id: $usuario->id, preguntaService: $preguntaService);
                return response([
                    'mensaje' => 'Puede iniciar el examen, conserve el siguiente token (1 hora de validez) :',
                    'token' => $token->token,
                    'expira' => Carbon::createFromFormat('Y-m-d H:i:s', $token->expires_at)->format("d/m/Y H:i")
                ], Response::HTTP_CREATED);
            }
        } catch (Exception $error) {
            return response([$error->getMessage(), $error->getTraceAsString()], 500);
        }
    }
    /**
     * muestra el resultado del examen
     */
    public function pregunta($token, $orden, ExamenService $examenService)
    {
        $response = null;
        $code = Response::HTTP_OK;

        if (!$this->validToken($token)) {
            $response = ['error' => "Token inválido."];
            $code = Response::HTTP_UNAUTHORIZED;
        } else {

            $response =    $examenService->obtenerPreguntaPorTokenOrden($token, $orden);
        }

        return response(
            $response,
            $code
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
                    'error' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ]
            );
        }
        $token = $request->post('token');
        $respuesta_id = $request->post('respuesta_id');
        $numero_pregunta = $request->post('numero_pregunta');
        $response = [];
        $code = Response::HTTP_OK;
        if (!$this->validToken($token)) {
            $response = ['mensaje' => "Token inválido."];
            $code = Response::HTTP_UNAUTHORIZED;
        } else {

            if ($examenService->responderPreguntaPorTokenOrden($token, $numero_pregunta, $respuesta_id)) {

                $proximoPaso = $examenService->generarUrlProximoPaso($token,  $numero_pregunta);
                array_push($response, ["mensaje" => "Pregunta $numero_pregunta respondida!"]);
                array_push($response, $proximoPaso);
            } else {
                $response = [
                    'error' => "Ya no puede responder a este exámen.",
                    "Vea su resultado en:" => url("api/examen/resultado/?token=$token")
                ];
                $code = Response::HTTP_NOT_FOUND;
            }
        }
        return response(
            $response,
            $code
        );
    }

    public function resultado($id, ExamenService $examenService)
    {
        $resultado = "";
        $code = Response::HTTP_OK;
        try {
            $resultado = $examenService->obtenerExamenFinalizado($id);
        } catch (Exception $e) {
            $resultado = ['error'  => $e->getMessage()];
            $code = Response::HTTP_NOT_FOUND;
        } finally {
            return response(
                $resultado,
                $code
            );
        }
    }

    public function reporte($usuario_id, ExamenService $examenService)
    {
        if (!$this->userValid($usuario_id)) {
            return response(
                [
                    'error' => 'Usted no esta autorizado para ejecutar esta acción.',
                    'status' => Response::HTTP_UNAUTHORIZED
                ]
            );
        }

        return response($examenService->reporte(), Response::HTTP_OK);
    }
}
