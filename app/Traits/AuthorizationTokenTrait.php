<?php

namespace App\Traits;

use App\Models\TokenUsuario;
use Carbon\Carbon;

trait AuthorizationTokenTrait
{

    public function validToken($token)
    {
        $_token = TokenUsuario::whereToken($token)->first();

        if (!is_null($_token)) {

            $expires_at = Carbon::createFromFormat('Y-m-d H:i:s', $_token->expires_at);

            if ($expires_at->gte(Carbon::now())) {

                return true;
            } else {

                $_token->delete();
                return false;
            }
        } else {
            return false;
        }
    }
}
