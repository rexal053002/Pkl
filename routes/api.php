<?php
use App\Models\Provinsi;
use App\Models\Kasuse;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Api Provinsi
Route::get('provinsi',[ProvinsiController::class, 'index']);
Route::post('provinsi/store',[ProvinsiController::class, 'store']);
Route::get('provinsi/{id}',[ProvinsiController::class, 'show']);
// Route::post('provinsi/update/{id}', [ProvinsiController::class, 'update']);
Route::delete('provinsi/{id}',[ProvinsiController::class, 'destroy']);


//kasuse
Route::get('indonesia',[ApiController::class, 'indonesia']);
Route::get('indonesia/provinsi',[ApiController::class, 'provinsi']);
Route::get('indonesia/kota',[ApiController::class, 'kota']);
Route::get('indonesia/kecamatan',[ApiController::class, 'kecamatan']);
Route::get('indonesia/kelurahan',[ApiController::class, 'kelurahan']);
Route::get('indonesia/provinsi/{id}',[ApiController::class, 'provinsikasus']);

// API Data Global
Route::get('global', [ApiController::class, 'global']);