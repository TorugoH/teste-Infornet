<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_servico_prestadors', function (Blueprint $table) {
            $table->id();
            $table->integer('idPrestador');
            $table->integer('idServico');
            $table->decimal('kmDeSaida');
            $table->decimal('valorDeSaida');
            $table->decimal('valorPorKmExcedente');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabela_servico_prestadors');
    }
};
