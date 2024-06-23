<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class ObterJWTController extends Controller
{
    public function obeterToken(Request $request){
        $dadosUsuario = $request->only('email', 'senha');
        $validarUsuario = User::where('email', $dadosUsuario['email'])->where('senha', $dadosUsuario['senha'])->first();

        if ($validarUsuario === null) {
            return response()->json(['error' => 'Ops ! Usuario nao encontrado']);
        }
        
        try {
            if (!$token = JWTAuth::fromUser($validarUsuario)) {
                return response()->json(['error' => 'Usuario não encontrado']);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Não foi possível criar o token']);
        }

        return response()->json([
            'email'=>$dadosUsuario['email'],
            'token' => $token
            
        ],200, [], JSON_PRETTY_PRINT);
    }
    
}
