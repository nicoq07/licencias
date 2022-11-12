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


    /**
     * TODO: cuando genera lo hace en UTC, y te muestra la hora en UTC
     * cuando muestra despues de la primera vez lo hace en UTC-3
     */
    public function generarTokenUsuario($usuario_id)
    {
        $token = (new TokenUsuarioService())->obtenerOCearTokenParaExamen($usuario_id);
        return $token;
    }
    public function borrarTokenUsuario($usuario_id, $token = null)
    {
        $r = (new TokenUsuarioService())->destruirToken($usuario_id, $token);
        return $r;
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
        if ($turno) {
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
