<?php

namespace App\Services;

use App\Models\Licencia;
use Carbon\Carbon;

class LicenciaService
{

    public function generarLicencia($usuario_id, $examen_id): Licencia
    {
        $licencia = new Licencia();
        $licencia->usuario_id = $usuario_id;
        $licencia->examen_id = $examen_id;
        $licencia->fecha_vencimiento = Carbon::now()->add('year', 5)->toDateTimeString();
        $licencia->fecha_obtencion = Carbon::now()->toDateTimeString();
        $licencia->licencia_clase_id = random_int(1, 18);
        $licencia->observaciones = "XXBNGFAS";
        $licencia->save();
        return $licencia;
    }
}
