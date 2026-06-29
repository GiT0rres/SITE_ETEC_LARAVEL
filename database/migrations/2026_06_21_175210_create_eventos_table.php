<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração e cria a tabela de eventos.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {

            /** Cria ID automático para cada evento */
            $table->id();

            /** Armazena o nome do evento */
            $table->string('nome');

            /** Guarda uma descrição do evento (opcional) */
            $table->text('descricao')->nullable();

            /** Armazena a data do evento */
            $table->date('data');

            /** Guarda o local do evento */
            $table->string('local')->nullable();

            /** Define quantidade de vagas disponíveis */
            $table->unsignedInteger('vagas')->nullable();

            /** Cria data de criação e atualização */
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de eventos */
        Schema::dropIfExists('eventos');
    }
};