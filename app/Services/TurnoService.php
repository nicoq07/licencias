<?php

namespace App\Services;

use App\Models\Persona;
use App\Models\Turno;
use Carbon\Carbon;

class TurnoService
{
    public function obtenerOCearTurno($usuario_id): Turno
    {
        $turno = Turno::whereActivo(true)->whereUsuarioId($usuario_id)->get();

        if ($turno->count() > 0) {
            return $turno->first();
        } else {
            $turno = new Turno(
                [
                    'usuario_id' => $usuario_id,
                    'fecha' => Carbon::now()->add(4, 'day'),
                    'asistio' => false,
                    'activo' => true
                ]
            );
            $turno->save();
            return $turno;
        }
    }

    public function borrarTurno($turno)
    {
        return $turno->delete(); 
    }
}
