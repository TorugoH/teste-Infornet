<?php

namespace App\Service;
use GuzzleHttp\Client;

class ApiGeolocalizaoService{
    protected $client;
    protected $url;
    protected $usuario;
    protected $senha;

    public function __construct(Client $client){
        $this->client = $client;
        $this->url= 'https://teste-infornet.000webhostapp.com/api/endereco/geocode/';
        $this->usuario=env('API_USERNAME');
        $this->senha=env('API_PASSWORD') ;
    }

    public function getLatitudeLongitude($endereco){
        $urlGeolocalizacao = $this->url.urlencode($endereco);
        try{
            $response =$this->client->request('GET',$urlGeolocalizacao,[
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