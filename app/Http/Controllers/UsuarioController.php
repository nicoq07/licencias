<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    public function home(Request $request)
    {
        $tiposDocumentos = Usuario::all();
        $msj = "Bienvenido al Sistema de Licencias, por favor ingrese su \nTipo de Documento:  \nDocumento: \n";
        return response($msj, 200)
            ->header('Content-Type', 'text/plain');
    }
}
