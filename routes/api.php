<?php

use App\Http\Controllers\ExamenController;
use App\Http\Controllers\UsuarioController;
use App\Models\Examen;
use Illuminate\Http\Request;
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
});


Route::prefix('examenes')->group(function () {
    // Route::get('/cuestionarioInicial', [ExamenController::class, 'cuestionarioInicial']);
    Route::post('/cuestionarioInicial', [ExamenController::class, 'cuestionarioInicial']);
    Route::post('/examen', [ExamenController::class, 'doCuestionario']);
    Route::get('/examen/{numero_pregunta}/{token}', [ExamenController::class, 'show']);
});
