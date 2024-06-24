<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\GerenciadorApiExternaService;

class ApiGeolocalizaoController extends Controller
{
    protected $apiService;

    public function __construct(GerenciadorApiExternaService $apiService){
        $this->apiService = $apiService;
        $this->urlBase= 'https://teste-infornet.000webhostapp.com/api/endereco/geocode/';
    }

    public function getLatitudeLongitude(Request $request, $endereco){
        $url = $this->urlBase.urlencode($endereco);
        $usuario=env('API_USERNAME');
        $senha=env('API_PASSWORD');

        $response = $this->apiService->get($url);
        
        if (isset($response['lat']) && isset($response['lon'])) {
            $responseGeolocalizao = [
                'lat' => $response['lat'],
                'lon' => $response['lon']
            ];
        } else {
            return response()->json(['error' => 'Latitude e longitude não encontrados'], 400);
        }
        
        return response()->json($responseGeolocalizao);
    }
}
