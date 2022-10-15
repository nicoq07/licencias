<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\TipoDocumento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    public function home()
    {
        $tiposDocumentos = json_encode(['DNI', 'LC', 'LE', 'CI']);
        $msj = "Bienvenido al Sistema de Licencias, por favor ingrese su \nTipo de Documento: $tiposDocumentos  \nDocumento: ... \n";
        return response($msj, 200)
            ->header('Content-Type', 'text/plain');
    }

    public function login(Request $request)
    {
        $tiposDocumentos = Persona::whereId(1)->first()->grupoSanguineo;

        // $msj = "Bienvenido al Sistema de Licencias, por favor ingrese su \nTipo de Documento: $tiposDocumentos  \nDocumento: ... \n";
        return response($tiposDocumentos, 200)
            ->header('Content-Type', 'text/plain');
    }
}
