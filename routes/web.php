<?php

use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/data-mahasiswa', DataMahasiswaController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');

Route::get('/register', [RegistrationController::class, 'index'])->name('get.registration');
Route::post('/register', [RegistrationController::class, 'registration'])->name('post.registration');
