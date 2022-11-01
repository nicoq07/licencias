<?php

namespace App\Services;

use App\Models\Persona;
use App\Models\TokenUsuario;
use App\Models\Turno;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UsuarioService
{


    public function generarTokenUsuario($usuario_id)
    {
        $token = (new TokenUsuarioService())->obtenerOCearTokenParaExamen($usuario_id);
        return $token;
    }
    public function borrarTokenUsuario($usuario_id, $token=null)
    {
        $r = (new TokenUsuarioService())->destruirToken($usuario_id, $token);
        return $r;
    }
    public function generarTokenUsuarioAdmin($usuario_id)
    {
        // $token = (new TokenUsuarioService())->obtenerOCearTokenParaExamen($usuario_id);
        // return $token;
    }

    public function generarTurno($usuario_id)
    {
        $turnoService = new TurnoService();
        return $turnoService->obtenerOCearTurno($usuario_id);
    }
    public function borrarTurno($usuario_id)
    {
        $turnoService = new TurnoService();
        $turno = Turno::whereUsuarioId($usuario_id)->get()->first();
        if($turno)
        {
            return $turnoService->borrarTurno($turno);
        }
    }

    public function obtenerUsuarioPorDocumento($documento, $tipo_documento_id)
    {
        # code...
    }

    public function obtenerUsuarioPorPersonaId($persona_id): Usuario
    {
        return Usuario::wherePersonaId($persona_id)->firstOrFail();
    }
}
