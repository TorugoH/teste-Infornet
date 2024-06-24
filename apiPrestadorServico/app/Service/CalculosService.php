<?php

namespace App\Service;

use App\Models\TabelaServicoPrestador;

class CalculosService
{
    public function calcularDistancia($lat1, $lon1, $lat2, $lon2)
    {
        // Implementação da fórmula de Haversine para calcular a distância entre dois pontos geográficos
        $earthRadius = 6371; // Raio da Terra em quilômetros

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance;
    }

    public function calcularValorTotal($prestador, $distancia)
    {
        
        $servicoPrestador = TabelaServicoPrestador::where('idPrestador', $prestador->id)
            ->where('idServico', $prestador->idServico)
            ->first();

        if ($distancia <= $servicoPrestador->kmDeSaida) {
            return $servicoPrestador->valorDeSaida;
        } else {
            $kmExcedente = $distancia - $servicoPrestador->kmDeSaida;
            return $servicoPrestador->valorDeSaida + ($kmExcedente * $servicoPrestador->valorPorKmExcedente);
        }
    }
}
