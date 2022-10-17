<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class ExamenController extends Controller
{
    //

    public function cuestionarioInicial(Request $request, UsuarioService $usuarioService)
    {
        $validator = Validator::make($request->all(), [
            'tipo_documento' => 'bail|required',
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

        //ver si utiliza anteojos y actualizar en la clasePersona
        //Si utiliza generar un turno para una revision

        //Si no utiliza, avanzar con el cuestionario



        return response('ok', 200);
    }
}
