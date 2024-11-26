<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();  // Cria a coluna de id com incremento automático
            $table->string('vehiclePlate');  // Coluna para armazenar a placa do veículo
            $table->dateTime('entryDateTime');  // Coluna para armazenar a data e hora de entrada
            $table->dateTime('exitDateTime');  // Coluna para armazenar a data e hora de saída
            $table->enum('priceType', ['hour', 'day', 'month']);  // Tipo de preço (ex: hora, dia, mês)
            $table->decimal('price', 10, 2);  // Coluna para armazenar o preço com 2 casas decimais
            $table->unsignedBigInteger('userId');  // Coluna que irá armazenar a chave estrangeira para a tabela users
            
             // Definindo a chave estrangeira
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');  // Remove a tabela service_orders
    }
};
