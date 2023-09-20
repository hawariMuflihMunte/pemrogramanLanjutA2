<?php

use App\Http\Controllers\FruitController;
use App\Http\Controllers\LatihanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tesAplikasi', function () {
    return view('tes');
});

Route::get('/user/{name}', function (string $name) {
    return view('user', ['name' => $name]);
});

Route::get('/r', function () {
    return view('r');
});

Route::redirect('/redirect', '/r');

Route::get('/cekphp', function () {
    echo phpinfo();
});

// Route to LatihanController
Route::get('/latihan', [LatihanController::class, 'index']);

// Route to FruitController
Route::get('/fruits', [FruitController::class, 'index']);
