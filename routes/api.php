<?php

use App\Http\Controllers\Api\ProspectoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/estado-uno', [ProspectoController::class, 'estadoUno'])->name('api.prospecto.estadoUno');
Route::post('/estado-dos', [ProspectoController::class, 'estadoDos'])->name('api.prospecto.estadoDos');
Route::post('/estado-tres', [ProspectoController::class, 'estadoTres'])->name('api.prospecto.estadoTres');
Route::post('/estado-cuatro', [ProspectoController::class, 'estadoCuatro'])->name('api.prospecto.estadoCuatro');
