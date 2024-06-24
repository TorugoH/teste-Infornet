<?php

namespace App\Service;

use App\Models\TabelaServicoPrestador;

class CalculosService{
    
  public function calcularDistancia($latitude_origem, $longitude_origem, $latitufe_destino, $longitude_destino){
        // Haversine 
        $earthRadius = 6371; 
        $dLat = deg2rad($latitufe_destino - $latitude_origem);
        $dLon = deg2rad($longitude_destino - $longitude_origem);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($latitude_origem)) * cos(deg2rad($latitufe_destino)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;
        return $distance;
    }

    public function calcularDistanciaTotal($prestadorLat, $prestadorLon, $origemLat, $origemLon, $destinoLat, $destinoLon){
      $distanciaPrestadorOrigem = $this->calcularDistancia($prestadorLat, $prestadorLon, $origemLat, $origemLon);
      $distanciaOrigemDestino = $this->calcularDistancia($origemLat, $origemLon, $destinoLat, $destinoLon);
      $distanciaDestinoPrestador = $this->calcularDistancia($destinoLat, $destinoLon, $prestadorLat, $prestadorLon);
      $distanciaTotal = $distanciaPrestadorOrigem + $distanciaOrigemDestino + $distanciaDestinoPrestador;

      $distanciaTotal = number_format($distanciaTotal, 2, '.', '');

      return $distanciaTotal;
      
    }

    public function calcularValorTotal($prestador, $distancia,$idServico){
        
        $servicoPrestador = TabelaServicoPrestador::where('idPrestador', $prestador->id)
           ->where('idServico', $idServico)
           ->first();
        if (!$servicoPrestador) {
                    return 0;
              }
        if ($distancia <= $servicoPrestador->kmDeSaida) {
            //$valorCalculado=$servicoPrestador->valorDeSaida;
            return number_format($servicoPrestador->valorDeSaida, 2, '.', '');
        } else {
           $kmExcedente = $distancia - $servicoPrestador->kmDeSaida;
           return number_format($servicoPrestador->valorDeSaida + ($kmExcedente * $servicoPrestador->valorPorKmExcedente), 2, '.', '');
        }
    }
}
