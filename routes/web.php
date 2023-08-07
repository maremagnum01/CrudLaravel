<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'index']);
//con resource aclaramos que se va a conectar a un controlador de recursos
//la url sera tasks 
//y el controlador de recursos sera TaskController::class
Route::resource('tasks', TaskController::class);

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class , 'store']);
Route::post('/logout', [AuthenticatedSessionController::class , 'destroy'])->name('logout');
