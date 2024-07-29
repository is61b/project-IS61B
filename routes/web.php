<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MhsController;

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

Route::get('/login-mhs', [App\Http\Controllers\MhsController::class, 'login']);
Route::post('/login-mhs', [App\Http\Controllers\MhsController::class, 'ceklogin'])->name('login-mhs');

Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/db-mahasiswa', [App\Http\Controllers\MhsController::class, 'index']);
});

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
