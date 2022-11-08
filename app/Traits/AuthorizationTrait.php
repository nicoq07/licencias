<?php

namespace App\Traits;

use App\Models\TokenUsuario;
use App\Models\Usuario;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

trait AuthorizationTrait
{

    public function validToken($token)
    {
        $_token = TokenUsuario::whereToken($token)->first();

        if (!is_null($_token)) {

            $expires_at = Carbon::createFromFormat('Y-m-d H:i:s', $_token->expires_at);

            if ($expires_at->gte(Carbon::now())) {

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
