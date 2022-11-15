<?php

namespace App\Services;

use App\Models\Persona;

class PersonaService
{



    public function actualizarUtilizaAnteojos($persona_id, $utiliza_anteojos): Persona
    {
        $persona = Persona::find($persona_id);
        $persona->utiliza_anteojos = boolval($utiliza_anteojos);
        $persona->saveOrFail();
        return $persona;
    }

    public function obtenerPersonaPorDocummentoTipoDocumento($documento, $tipo_documento_id, $utiliza_anteojos): Persona
    {
        $persona = Persona::whereDocumento($documento)->whereTipoDocumentoId($tipo_documento_id)->firstOrFail();
        return $persona;
    }
}
