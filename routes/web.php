<?php

use App\Http\Controllers\SiswaController;
use Database\Seeders\SiswaSeeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });


Auth::routes();
// route dashboard
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'] );
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'] )->name('home');

// route siswa
Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index'] )->name('siswa');
Route::get('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create'] )->name('siswa.create');
Route::post('/siswa',[SiswaController::class,'storage'])->name('siswa.storage');
Route::get('/siswa/{siswa}/profile',[SiswaController::class,'profile'])->name('siswa.profile');
Route::match(['put', 'patch'], '/siswa/{siswa}/profile', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{siswa}',[SiswaController::class,'delete'])->name('siswa.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
