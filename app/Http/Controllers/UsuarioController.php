<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Persona;
use App\Models\TipoDocumento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class UsuarioController extends Controller
{
    //

    public function home()
    {
        $tiposDocumentos = json_encode(['DNI', 'LC', 'LE', 'CI']);
        $msj = "Bienvenido al Sistema de Licencias,\n por favor ingrese su \nTipo de Documento: $tiposDocumentos  \nDocumento: ... \n Utiliza Anteojos:...";
        return response($msj, 200);
    }

    // public function doLogin(Request $request)
    // {

    //     if (Auth::attempt(request()->only('documento', 'tipo_documento'))) {
    //         return response([
    //             'AuthUser' => Auth::user()->tipo_documento
    //         ], 200);
    //     }

    //     return back()->withErrors([
    //         'documento' => 'invalid credentials',
    //     ]);
    // }

    // public function test()
    // {

    //     // $tiposDocumentos = Persona::whereId(1)->first()->grupoSanguineo;

    //     $tiposDocumentos = Examen::whereId(1)->first()->preguntas()->first()->respuesta;

    //     // $msj = "Bienvenido al Sistema de Licencias, por favor ingrese su \nTipo de Documento: $tiposDocumentos  \nDocumento: ... \n";
    //     return response($tiposDocumentos, 200);
    // }
}
