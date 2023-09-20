<?php

use App\Http\Controllers\FruitController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\StudentData;
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

Route::get('/user/{name}', function (string $name) {
    return view('user', ['name' => $name]);
});

Route::get('/cekphp', function () {
    echo phpinfo();
});

Route::get('/latihan', [
    LatihanController::class, 'index'
]);

Route::get('/fruits', FruitController::class);

Route::get('/student-data', [
    StudentData::class, 'index'
]);
