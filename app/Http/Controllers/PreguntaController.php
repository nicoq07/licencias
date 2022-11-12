<?php

namespace App\Http\Controllers;

use App\Services\PreguntaService;
use App\Traits\AuthorizationAdminTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class PreguntaController extends Controller
{
    use AuthorizationAdminTrait;

    public function store(Request $request, PreguntaService $preguntaService)
    {

        $validator = Validator::make($request->post(), [
            'pregunta' => 'required',
            'respuesta' => 'required',
            'usuario_id' => 'required',
        ]);
        $data = $request->post();
        $code = 201;
        $response = "";
        if ($validator->fails()) {
            return response(
                [
                    'errors' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
        if ($this->userValid($data['usuario_id'])) {
            if ($preguntaService->store($data)) {
                $response = ['mensaje' => "Pregunta guardada!"];
            } else {
                $response = ['mensaje' => "No se pudo guardar la pregunta, reintente!"];
            }
        } else {
            $code = 401;
            $response = ['mensaje' => "No posee permisos para ejecutar esta acción."];
        }
        return  response(
            $response,
            $code
        );
    }

    public function edit(Request $request, PreguntaService $preguntaService)
    {

        $validator = Validator::make($request->all(), [
            'pregunta_id' => 'required',
            'respuesta_id' => 'required',
            'pregunta_descripcion' => 'required',
            'respuesta_descripcion' => 'required',
            'usuario_id' => 'required',
        ]);
        $data = $request->post();
        $code = 201;
        $response = "";
        if ($validator->fails()) {
            return response(
                [
                    'errors' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
        if ($this->userValid($data['usuario_id'])) {
            if ($preguntaService->store($data)) {
                $response = ['mensaje' => "Pregunta guardada!"];
            } else {
                $response = ['mensaje' => "No se pudo guardar la pregunta, reintente!"];
            }
        } else {
            $code = 401;
            $response = ['mensaje' => "No posee permisos para ejecutar esta acción."];
        }
        return  response(
            $response,
            $code
        );
    }

    public function index(PreguntaService $preguntaService)
    {
        return $preguntaService->getPreguntas();
    }
}
