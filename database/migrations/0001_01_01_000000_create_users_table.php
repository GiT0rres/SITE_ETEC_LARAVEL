<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações e cria as tabelas no banco.
     */
    public function up(): void
    {
        /**
         * Cria a tabela de usuários
         */
        Schema::create('users', function (Blueprint $table) {

            /** Cria o ID automático */
            $table->id();

            /** Armazena o nome do usuário */
            $table->string('name');

            /** Armazena o e-mail sem repetir valores */
            $table->string('email')->unique();

            /** Guarda a data da confirmação do e-mail */
            $table->timestamp('email_verified_at')->nullable();

            /** Armazena a senha criptografada */
            $table->string('password');

            /** Cria token para manter login ativo */
            $table->rememberToken();

            /** Cria data de criação e atualização */
            $table->timestamps();
        });

        /**
         * Cria a tabela para recuperação de senha
         */
        Schema::create('password_reset_tokens', function (Blueprint $table) {

            /** Define o e-mail como chave principal */
            $table->string('email')->primary();

            /** Guarda o token de recuperação */
            $table->string('token');

            /** Guarda a data de criação do token */
            $table->timestamp('created_at')->nullable();
        });

        /**
         * Cria a tabela de sessões dos usuários
         */
        Schema::create('sessions', function (Blueprint $table) {

            /** Identificador único da sessão */
            $table->string('id')->primary();

            /** Relaciona a sessão ao usuário */
            $table->foreignId('user_id')->nullable()->index();

            /** Guarda o endereço IP */
            $table->string('ip_address', 45)->nullable();

            /** Guarda informações do navegador */
            $table->text('user_agent')->nullable();

            /** Armazena os dados da sessão */
            $table->longText('payload');

            /** Registra a última atividade */
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Remove as tabelas criadas caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de usuários */
        Schema::dropIfExists('users');

        /** Remove tabela de recuperação de senha */
        Schema::dropIfExists('password_reset_tokens');

        /** Remove tabela de sessões */
        Schema::dropIfExists('sessions');
    }
};