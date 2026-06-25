<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações e cria as tabelas de cache.
     */
    public function up(): void
    {
        /**
         * Cria a tabela responsável por armazenar cache
         */
        Schema::create('cache', function (Blueprint $table) {

            /** Chave única que identifica o cache */
            $table->string('key')->primary();

            /** Armazena os dados do cache */
            $table->mediumText('value');

            /** Guarda o tempo de expiração */
            $table->bigInteger('expiration')->index();
        });

        /**
         * Cria a tabela de controle de bloqueio do cache
         */
        Schema::create('cache_locks', function (Blueprint $table) {

            /** Chave única do bloqueio */
            $table->string('key')->primary();

            /** Guarda quem possui o bloqueio */
            $table->string('owner');

            /** Define quando o bloqueio expira */
            $table->bigInteger('expiration')->index();
        });
    }

    /**
     * Remove as tabelas criadas caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de cache */
        Schema::dropIfExists('cache');

        /** Remove tabela de bloqueio de cache */
        Schema::dropIfExists('cache_locks');
    }
};