<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;

class LicenciaController extends Controller
{
    //

    //TODO: Generar una licencia cuando se aprueba el examen y mostrarla
    public function show($usuarioId, $licenciaId)
    {
        $licencia = Licencia::whereId($licenciaId)->whereUsuarioId($usuarioId)->get()->first();
        return response($licencia, 200);
    }
}
