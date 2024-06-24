<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ApiGeolocalizaoController;
use App\Http\Controllers\ObeterJWTController;
use App\Http\Controllers\ObterJWTController;
use App\Http\Controllers\ApiVerificarStatusPrestador;
use App\Http\Controllers\buscarPrestadorController;
Route::post('/autenticacao',[ObterJWTController::class,'obeterToken']);
Route::post('/buscarPrestador',[buscarPrestadorController::class,'buscarPrestadores']);
Route::middleware(['jwt.auth'])->group(function(){
    Route::get('/buscadeServiçosDisponíveis',[ServicoController::class,'listarServicos']);
    Route::get('/buscarCoordenadas/{endereco}',[ApiGeolocalizaoController::class,'getLatitudeLongitude']);
    //Route::get('/verificarStatus',[ApiVerificarStatusPrestador::class,'verificarStatusPrestadores']);
});




