<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiVerificarStatusPrestador extends Controller
{
    protected $client;
    protected $urlBase = 'https://teste-infornet.000webhostapp.com/api/prestadores/online';
    protected $usuario;
    protected $senha;

    public function __construct(Client $client){
        $this->client = $client;
        $this->usuario = env('API_USERNAME');
        $this->senha = env('API_PASSWORD');
    }

    public function verificarStatusPrestadores($prestadoresIds){
        try {
            $options = [
                'auth' => [
                    $this->usuario,
                    $this->senha,
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'prestadores' => $prestadoresIds,
                ],
            ];
            
            $response = $this->client->request('GET', $this->urlBase, $options);
            
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return ['error' => 'Erro ao comunicar com a API'];
        }
    }
}
