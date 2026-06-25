<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração e cria a tabela de cursos.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {

            /** Cria ID automático para cada curso */
            $table->id();

            /** Armazena o nome do curso */
            $table->string('nome');

            /** Guarda uma descrição do curso (opcional) */
            $table->text('descricao')->nullable();

            /**
             * Define o tipo do curso:
             * técnico ou especialização
             */
            $table->enum('tipo', ['tecnico', 'especializacao'])
                  ->default('tecnico');

            /** Armazena a duração do curso */
            $table->string('duracao')->nullable();

            /** Define quantidade de vagas disponíveis */
            $table->unsignedInteger('vagas')->default(40);

            /** Define se o curso está ativo */
            $table->boolean('ativo')->default(true);

            /** Cria data de criação e atualização */
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de cursos */
        Schema::dropIfExists('cursos');
    }
};