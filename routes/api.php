<?php

use App\Http\Controllers\ExamenController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/home', [UsuarioController::class, 'home']);

Route::prefix('usuarios')->group(function () {
    Route::post('/login', [UsuarioController::class, 'doLogin']);
    Route::get('/', [UsuarioController::class, 'index']);
});



Route::prefix('examen')->group(function () {
    // Route::get('/cuestionarioInicial', [ExamenController::class, 'cuestionarioInicial']);
    Route::post('/cuestionarioInicial', [ExamenController::class, 'cuestionarioInicial']);
    Route::post('/do', [ExamenController::class, 'doCuestionario']);
    Route::get('/pregunta/', [ExamenController::class, 'pregunta']);
    Route::get('/resultado/', [ExamenController::class, 'resultado']);
});

Route::prefix('pregunta')->group(function () {

    Route::post('/', [PreguntaController::class, 'store']);
    Route::post('/edit', [PreguntaController::class, 'edit']);
});
Route::get('preguntas', [PreguntaController::class, 'index']);
