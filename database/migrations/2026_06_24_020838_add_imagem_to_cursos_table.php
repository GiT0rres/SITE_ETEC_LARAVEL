<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração e adiciona uma nova coluna.
     */
    public function up(): void
    {
        Schema::table('cursos', function (Blueprint $table) {

            /**
             * Adiciona o campo de imagem no curso.
             * O campo é opcional e ficará depois de vagas.
             */
            $table->string('imagem')
                ->nullable()
                ->after('vagas');
        });
    }

    /**
     * Remove a alteração caso a migração seja desfeita.
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {

            /** Remove a coluna imagem */
            $table->dropColumn('imagem');
        });
    }
};