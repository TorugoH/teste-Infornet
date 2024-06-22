<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ApiGeolocalizaoController;

Route::get('/servicos',[ServicoController::class,'listarServicos']);
Route::get('/getGeolocalizacao/{endereco}',[ApiGeolocalizaoController::class,'getLatitudeLongitude']);