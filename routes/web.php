<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;

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

// Route::get('/', function () {
//     return view('master');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['CekAkses:admin'])->group(function () {
        //data jurusan
        Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit']);
        Route::put('/jurusan/{id}', [JurusanController::class, 'update']);
        Route::delete('/jurusan/{id}', [JurusanController::class, 'destroy']);
    });

    Route::get('/jurusan/', [JurusanController::class, 'index']);
    Route::get('/jurusan/form/', [JurusanController::class, 'create']);
    Route::post('/jurusan/store/', [JurusanController::class, 'store']);

    //data mahasiswa
    Route::get('/mahasiswa/', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/form/', [MahasiswaController::class, 'create']);
    Route::post('/mahasiswa/store/', [MahasiswaController::class, 'store']);

});
