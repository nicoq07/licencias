<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Persona;
use App\Models\TipoDocumento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class UsuarioController extends Controller
{
    //

    public function home()
    {
        $tiposDocumentos = json_encode(['DNI', 'LC', 'LE', 'CI']);
        $msj = "Bienvenido al Sistema de Licencias, por favor ingrese su \nTipo de Documento: $tiposDocumentos  \nDocumento: ... \n";
        return response($msj, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipo_documento' => 'required',
            'documento' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'errors' => $validator->errors(),
                    'status' => Response::HTTP_BAD_REQUEST
                ]
            );
        }
        // $tiposDocumentos = Persona::whereId(1)->first()->grupoSanguineo;

        $tiposDocumentos = Examen::whereId(1)->first()->preguntas()->first()->respuesta;

        // $msj = "Bienvenido al Sistema de Licencias, por favor ingrese su \nTipo de Documento: $tiposDocumentos  \nDocumento: ... \n";
        return response($tiposDocumentos, 200);
    }
}
