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
        Schema::create('prestador', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('logradouro');
            $table->string('bairro');
            $table->integer('numero');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->string('cidade');
            $table->string('UF');
            $table->string('situacao');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestadors');
    }
};
