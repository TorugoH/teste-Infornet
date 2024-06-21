<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function listarServicos(){
        $servicos= Servico::all();
        return response()->json($servicos);
    }
}
