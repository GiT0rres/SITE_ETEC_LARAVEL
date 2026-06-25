<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração e cria a tabela de alunos.
     */
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {

            /** Cria ID automático para cada aluno */
            $table->id();

            /** Armazena o nome do aluno */
            $table->string('nome');

            /** Guarda o e-mail e não permite repetição */
            $table->string('email')->unique();

            /** Guarda o RA do aluno e não permite repetição */
            $table->string('ra')->unique();

            /**
             * Relaciona o aluno com uma turma.
             * Se a turma for excluída, o aluno também será.
             */
            $table->foreignId('turma_id')
                ->constrained('turmas')
                ->cascadeOnDelete();

            /** Cria data de criação e atualização */
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de alunos */
        Schema::dropIfExists('alunos');
    }
};