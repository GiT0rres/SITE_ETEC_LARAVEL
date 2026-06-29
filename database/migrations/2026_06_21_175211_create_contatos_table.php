<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração e cria a tabela de contatos.
     */
    public function up(): void
    {
        Schema::create('contatos', function (Blueprint $table) {

            /** Cria ID automático para cada contato */
            $table->id();

            /** Armazena o nome da pessoa */
            $table->string('nome');

            /** Guarda o e-mail informado */
            $table->string('email');

            /** Armazena o assunto da mensagem */
            $table->string('assunto');

            /** Guarda o conteúdo da mensagem */
            $table->text('mensagem');

            /** Cria data de criação e atualização */
            $table->timestamps();
        });
    }

    /**
     * Remove a tabela caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de contatos */
        Schema::dropIfExists('contatos');
    }
};