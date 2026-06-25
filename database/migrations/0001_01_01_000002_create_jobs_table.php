<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações e cria as tabelas de processamento.
     */
    public function up(): void
    {
        /**
         * Cria a tabela de filas de tarefas
         */
        Schema::create('jobs', function (Blueprint $table) {

            /** Cria ID automático */
            $table->id();

            /** Define a fila onde a tarefa será executada */
            $table->string('queue')->index();

            /** Armazena os dados da tarefa */
            $table->longText('payload');

            /** Guarda quantidade de tentativas */
            $table->unsignedSmallInteger('attempts');

            /** Guarda quando a tarefa foi reservada */
            $table->unsignedInteger('reserved_at')->nullable();

            /** Define quando ficará disponível */
            $table->unsignedInteger('available_at');

            /** Guarda data de criação */
            $table->unsignedInteger('created_at');
        });

        /**
         * Cria a tabela de lotes de tarefas
         */
        Schema::create('job_batches', function (Blueprint $table) {

            /** Identificador único do lote */
            $table->string('id')->primary();

            /** Nome do lote */
            $table->string('name');

            /** Total de tarefas */
            $table->integer('total_jobs');

            /** Quantidade pendente */
            $table->integer('pending_jobs');

            /** Quantidade com falha */
            $table->integer('failed_jobs');

            /** Guarda IDs das tarefas que falharam */
            $table->longText('failed_job_ids');

            /** Armazena configurações extras */
            $table->mediumText('options')->nullable();

            /** Data de cancelamento */
            $table->integer('cancelled_at')->nullable();

            /** Data de criação */
            $table->integer('created_at');

            /** Data de conclusão */
            $table->integer('finished_at')->nullable();
        });

        /**
         * Cria tabela para registrar tarefas com erro
         */
        Schema::create('failed_jobs', function (Blueprint $table) {

            /** ID automático */
            $table->id();

            /** Identificador único */
            $table->string('uuid')->unique();

            /** Conexão utilizada */
            $table->string('connection');

            /** Nome da fila */
            $table->string('queue');

            /** Dados enviados na tarefa */
            $table->longText('payload');

            /** Guarda detalhes do erro */
            $table->longText('exception');

            /** Registra momento da falha */
            $table->timestamp('failed_at')->useCurrent();

            /** Cria índice para melhorar consultas */
            $table->index([
                'connection',
                'queue',
                'failed_at'
            ]);
        });
    }

    /**
     * Remove as tabelas caso a migração seja desfeita.
     */
    public function down(): void
    {
        /** Remove tabela de tarefas */
        Schema::dropIfExists('jobs');

        /** Remove tabela de lotes */
        Schema::dropIfExists('job_batches');

        /** Remove tabela de tarefas com falha */
        Schema::dropIfExists('failed_jobs');
    }
};