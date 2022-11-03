<?php

use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicial');

Auth::routes();

/***Usuario */

Route::get('login',[UserController::class,'loginindex'])->name('user.login.index');
Route::post('login',[UserController::class,'login'])->name('user.login');

    
Route::get('/dashboard', [UserController::class,'index'])->name('home');
Route::post('/comunicion',[UserController::class,'comunicacion'])->name('comunicacion.store');
Route::post('/comunicion2',[UserController::class,'comunicacion2'])->name('comunicacion2.store');


Route::get('usuario-index',[UserController::class,'inde'])->name('user.index');
Route::get('usuario-create',[UserController::class,'create'])->name('user.create');
Route::post('usuario',[UserController::class,'store'])->name('user.store');
Route::get('usuario',[UserController::class,'edit'])->name('user.edit');
Route::put('usuario/{id}',[UserController::class,'update'])->name('user.update');
Route::delete('usuario/{id}',[UserController::class,'destroy'])->name('user.destroy');
Route::get('pedido/{id}',[UserController::class,'pedido'])->name('user.pedido');
Route::get('dash',[UserController::class,'tarjeta'])->name('user.tarjeta');

