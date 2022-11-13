<?php

namespace App\Services;

use App\Models\TokenUsuario;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Symfony\Component\CssSelector\Parser\Token;

class TokenUsuarioService
{

    private $examenService;

    public function crearToken($usuario_id): TokenUsuario
    {
        $tokenUsuario = new TokenUsuario();
        $tokenUsuario->usuario_id = $usuario_id;
        $tokenUsuario->token = Str::random(32);
        $tokenUsuario->expires_at = Carbon::now()->add(1, 'hour');

        $tokenUsuario->save();

        return $tokenUsuario;
    }

    public function obtenerOCearTokenParaExamen($usuario_id, PreguntaService $preguntaService)
    {
        $token = TokenUsuario::whereUsuarioId($usuario_id)->get()->first();

        if ($token) {
            $expires_at = Carbon::createFromFormat('Y-m-d H:i:s', $token->expires_at);
            if ($expires_at->gte(Carbon::now())) {

                return $token;
            }
        } else {
            $examenService = new ExamenService();
            $examenService->iniciarExamen($usuario_id, $preguntaService);
            $token = $this->crearToken($usuario_id);
            return $token;
        }

        return $token;
    }

    public function obtenerUsuarioPorToken($token): Usuario
    {
        //validar si es valido
        $tokenUsuario = TokenUsuario::whereToken($token)->first();
        return Usuario::find($tokenUsuario->usuario_id);
    }

    public function CearTokenParaAdmin($usuario_id)
    {
        // $token = TokenUsuario::whereUsuarioId($usuario_id)->get()->first();

        // if ($token) {
        //     $expires_at = Carbon::createFromFormat('Y-m-d H:i:s', $token->expires_at);
        //     if ($expires_at->gte(Carbon::now())) {
        //         return $token;
        //     }
        // } else {
        //     $token = $this->crearToken($usuario_id);
        //     return $token;
        // }

        // return $token;
    }

    public function destruirToken($usuario_id, $token = null)
    {
        $tokenUsuario = TokenUsuario::whereUsuarioId($usuario_id);

        if ($token) {
            $tokenUsuario =  $tokenUsuario->whereToken($token)->orWhere('expires_at', '>=', Carbon::now())->get()->first()->delete();
        } else {
            $tokenUsuario = $tokenUsuario->get()->first();
            if ($tokenUsuario) $tokenUsuario->delete();
        }
        return true;
    }
}
