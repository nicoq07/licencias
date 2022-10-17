<?php

namespace App\Services;

use App\Models\TokenUsuario;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UsuarioService
{


    public function generarTokenUsuario($usuario_id)
    {
        $tokenUsuario = new TokenUsuario();
        $tokenUsuario->usuario_id = $usuario_id;
        $tokenUsuario->token = Str::random(32);
        $tokenUsuario->expires_at = Carbon::now()->add(1, 'hour')->toDateTimeString();

        $tokenUsuario->save();

        return $tokenUsuario->token;
    }

    public function utilizaAnteojos($data)
    {
        //
    }
}
