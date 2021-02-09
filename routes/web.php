<?php

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
});

// Route::get('/', function(){
//     return view('frontend.index');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

Route::get('test', function(){
    return view('halo');
});


use App\Http\Controllers\ProvinsiController;
Route::resource('backend/provinsi', ProvinsiController::class);

use App\Http\Controllers\KotaController;
Route::resource('backend/kota', KotaController::class);

use App\Http\Controllers\KecamatanController;
Route::resource('backend/kecamatan', KecamatanController::class);

use App\Http\Controllers\KelurahanController;
Route::resource('backend/kelurahan', KelurahanController::class);

use App\Http\Controllers\RwController;
Route::resource('backend/rw', RwController::class);

use App\Http\Controllers\KasusController;
Route::resource('backend/kasus', KasusController::class);

Route::view('backend/city','livewire.home');