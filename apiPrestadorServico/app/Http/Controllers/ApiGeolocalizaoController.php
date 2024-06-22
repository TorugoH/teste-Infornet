<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\ApiGeolocalizaoService;

class ApiGeolocalizaoController extends Controller
{
    protected $apiService;

    public function __construct(ApiGeolocalizaoService $apiService){
        $this->apiService = $apiService;
    }

    public function getLatitudeLongitude(Request $request, $endereco){
        $usuario=env('API_USERNAME');
        $senha=env('API_PASSWORD');

        $response = $this->apiService->getLatitudeLongitude($endereco);
        
        if (isset($response['lat']) && isset($response['lon'])) {
            $responseGeolocalizao = [
                'lat' => $response['lat'],
                'lon' => $response['lon']
            ];
        } else {
            return response()->json(['error' => 'Campos lat ou lon não encontrados na resposta'], 400);
        }
        
        return response()->json($responseGeolocalizao);
    }
}
