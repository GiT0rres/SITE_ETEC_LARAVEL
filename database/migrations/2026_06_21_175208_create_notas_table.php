<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração e cria a tabela de notas.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {

            /** Cria ID automático para cada nota */
            $table->id();

            /**
             * Relaciona a nota com um aluno.
             * Se o aluno for excluído, a nota também será.
             */
            $table->foreignId('aluno_id')
                ->constrained('alunos')
                ->cascadeOnDelete();

            /**
             * Relaciona a nota com uma turma.
             * Se a turma for excluída, a nota também será.
             */
            $table->foreignId('turma_id')
                ->constrained('turmas')
                ->cascadeOnDelete();

            /** Guarda o nome da disciplina */
            $table->string('disciplina');

            /** Define o período da nota */
            $table->unsignedTinyInteger('periodo')->default(1);

            /** Armazena a nota da primeira prova */
            $table->decimal('prova1', 4, 1)->default(0.0);

            /** Armazena a nota da segunda prova */
            $table->decimal('prova2', 4, 1)->default(0.0);

            /** Armazena a nota do trabalho */
            $table->decimal('trabalho', 4, 1)->default(0.0);

            /** Guarda a média final do aluno */
            $table->decimal('media', 4, 1)->default(0.0);

            /** Cria data de criação e atualização */
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de notas */
        Schema::dropIfExists('notas');
    }
};