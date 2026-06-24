<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->cascadeOnDelete();
            $table->foreignId('turma_id')->constrained('turmas')->cascadeOnDelete();
            $table->string('disciplina');
            $table->unsignedTinyInteger('periodo')->default(1);
            $table->decimal('prova1',   4, 1)->default(0.0);
            $table->decimal('prova2',   4, 1)->default(0.0);
            $table->decimal('trabalho', 4, 1)->default(0.0);
            $table->decimal('media',    4, 1)->default(0.0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};