<?php

namespace Tests\Unit;

use Illuminate\Http\Response;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class LicenciaTest extends TestCase
{
    private $path = "api/examen/";

    // public function test_basic_test()
    // {
    //     $response = $this->get('/');

    //     $response->ddHeaders();

    //     $response->ddSession();

    //     $response->dd();
    // }
    public function test_cuestionario_inicial_token()
    {
        $payload = [
            'tipo_documento_id' => 1,
            'documento'  => 38776090,
            'utiliza_anteojos' => 0
        ];

        $response = $this->json('POST', $this->path . "cuestionarioInicial", $payload);

        $response
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(
                [
                    'mensaje',
                    'token',
                    'expira'
                ]
            )
            ->assertJson([
                'mensaje' => $response->original['mensaje'],
                'token' => $response->original['token'],
                'expira' => $response->original['expira'],
            ]);

        $this->assertDatabaseHas('tokens_usuarios', [
            'token' => $response->original['token'],
        ]);
    }

    public function test_cuestionario_inicial_turno()
    {
        $payload = [
            'tipo_documento_id' => 1,
            'documento'  => 38776090,
            'utiliza_anteojos' => 1
        ];

        $response = $this->json('POST', $this->path . "cuestionarioInicial", $payload);

        $response
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(
                [
                    'mensaje',
                    'dia_hora',
                    'Numero de turno'
                ]
            )
            ->assertJson([
                'mensaje' => $response->original['mensaje'],
                'dia_hora' => $response->original['dia_hora'],
                'Numero de turno' => $response->original['Numero de turno'],
            ]);

        $this->assertDatabaseHas('turnos', [
            'id' => $response->original['Numero de turno'],
        ]);
    }
}
