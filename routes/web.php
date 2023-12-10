<?php

use App\Models\Absen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function (Absen $absen) {
    return view('login.index');
})->middleware('guest');

Route::get('/home', function (Absen $absen) {
    return view('home');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'auth']);

Route::get('/index', function (Absen $absen) {
    return view('index', [
        'absen' => Absen::all()
    ]);
})->middleware('auth');

Route::post('/store', [AbsenController::class, 'store'])->name('store')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout']);
