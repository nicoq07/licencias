<?php

namespace App\Traits;

use App\Models\Usuario;
use Carbon\Carbon;

trait AuthorizationAdminTrait
{

    public function userValid($usuario_id)
    {
        $usuario = Usuario::whereId($usuario_id)->first();

        if (!is_null($usuario)) {

            if ($usuario->rol_id == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
