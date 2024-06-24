<?php

namespace App\Service;
use GuzzleHttp\Client;

class GerenciadorApiExternaService{
    protected $client;
    protected $url;
    protected $usuario;
    protected $senha;

    public function __construct(Client $client){
        $this->client = $client;
        $this->usuario=env('API_USERNAME');
        $this->senha=env('API_PASSWORD') ;
    }

    public function get($url){
        
        try{
            $response =$this->client->request('GET',$url,[
                'auth'=>[
                    $this->usuario,
                    $this->senha,
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);
            return json_decode($response->getBody()->getContents(), true);
        }catch(\Excption $e){
            return ['error'=>'Erro ao comunicar com a API'];
        }
    }
}