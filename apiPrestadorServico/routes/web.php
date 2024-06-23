<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ApiGeolocalizaoController;
use App\Http\Controllers\ObeterJWTController;
use App\Http\Controllers\ObterJWTController;

Route::post('/obeterToken',[ObterJWTController::class,'obeterToken']);

Route::middleware(['jwt.auth'])->group(function(){
    Route::get('/servicos',[ServicoController::class,'listarServicos']);
    Route::get('/getGeolocalizacao/{endereco}',[ApiGeolocalizaoController::class,'getLatitudeLongitude']);
});




