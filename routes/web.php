<?php

use App\Http\Controllers\FruitController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentData;
use App\Http\Controllers\StudentDataController;
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

Route::get('/fruits', FruitController::class)->name('fruits');
Route::get('/fruits/add', [FruitController::class, 'add'])->name('add');
Route::post('/fruit/save', [FruitController::class, 'save'])->name('save');
Route::get('/fruits/edit/{id}', [FruitController::class, 'edit'])->name('edit');
Route::put('/fruits/edit/{id}', [FruitController::class, 'update'])->name('edit.fruits');
Route::delete('/fruits/delete', [FruitController::class, 'delete'])->name('delete');

Route::get('/studentdata', StudentDataController::class);

Route::resource('/students', StudentController::class);
