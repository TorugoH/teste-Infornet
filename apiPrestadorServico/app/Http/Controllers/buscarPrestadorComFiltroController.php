<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestador;
use App\Service\CalculosService;
use App\Http\Controllers\ApiVerificarStatusPrestador;

class buscarPrestadorComFiltroController extends Controller{
    protected $calculadora;
    protected $statusService;

    public function __construct(CalculosService $calculadora, ApiVerificarStatusPrestador $statusService){
        $this->calculadora = $calculadora;
        $this->statusService = $statusService;
    }
    public function buscarPrestadores(Request $request){
        $origem = $request->input('origem');
        $destino = $request->input('destino');
        $idServico = $request->input('idServico');
        $quantidade = $request->input('quantidade');
        $ordenacao = $request->input('ordenacao',[]);
        $filtros = $request->input('filtros', []);

        $query = Prestador::select('prestador.*')
            ->join('tabela_servico_prestadors', 'prestador.id', '=', 'tabela_servico_prestadors.idPrestador')
            ->where('tabela_servico_prestadors.idServico', $idServico);

        if (isset($filtros['status'])) {
            $prestadoresIds = $query->pluck('prestador.id')->toArray();
            $statusResponse = $this->statusService->verificarStatusPrestadores($prestadoresIds);

            if (isset($statusResponse['error'])) {
                return response()->json(['error' => 'Ops ! Nenhum prestador encontrado.'], 500);
            }

            $statusPrestadores = $statusResponse['prestadores'];
            $prestadoresOnlineIds = array_column(array_filter($statusPrestadores, function ($prestador) use ($filtros) {
                $statusFiltro = strtolower($filtros['status']);
                $statusPrestador = strtolower($prestador['status']);
                return $statusPrestador === $statusFiltro;
            }), 'idPrestador');

            $query->whereIn('prestador.id', $prestadoresOnlineIds);

            if (isset($filtros['cidade'])) {
                $query->where('prestador.cidade', $filtros['cidade']);
            }

            if (isset($filtros['UF'])) {
                $query->where('prestador.UF', $filtros['UF']);
            }

            $prestadores = $query->limit($quantidade)->get();
            foreach ($prestadores as $prestador) {
                $prestador->status = $statusPrestadores[array_search($prestador->id, array_column($statusPrestadores, 'idPrestador'))]['status'];
                $distancia_total = $this->calculadora->calcularDistanciaTotal($prestador->latitude,$prestador->longitude,$origem['latitude'], $origem['longitude'], $destino['latitude'], $destino['longitude']);
                $prestador->distancia_total = $distancia_total;
                $prestador->valor_total = $this->calculadora->calcularValorTotal($prestador,$distancia_total,$idServico);
            }
            foreach ($ordenacao as $ordenacoes) {
                $prestadores = $prestadores->sortBy($ordenacoes);
            }

            return response()->json($prestadores);
        } else {
            return response()->json("Ops! Por favor digite o status do prestadores que você deseja encontrar");
        }
    }
}
