<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração e cria a tabela de turmas.
     */
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {

            /** Cria ID automático para cada turma */
            $table->id();

            /** Armazena o nome da turma */
            $table->string('nome');

            /**
             * Relaciona a turma com um curso.
             * Se o curso for excluído, a turma também será.
             */
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnDelete();

            /**
             * Define o período da turma:
             * manhã, tarde ou noite
             */
            $table->enum('periodo', [
                'manha',
                'tarde',
                'noite'
            ])->default('manha');

            /** Armazena o ano da turma */
            $table->year('ano');

            /** Cria data de criação e atualização */
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de turmas */
        Schema::dropIfExists('turmas');
    }
};