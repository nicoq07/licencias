<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //

    public function home(Request $request)
    {
        $tiposDocumentos = TipoDocumento::all('descripcion')->toJson();
        $msj = "Bienvenido al Sistema de Licencias, por favor ingrese su \nTipo de Documento: $tiposDocumentos \nDocumento: \n";
        return response($msj, 200)
            ->header('Content-Type', 'text/plain');
    }
}
