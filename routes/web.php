<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\CursoController;
use App\Http\Controllers\Backend\EventoController;
use App\Http\Controllers\FormularioController;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\NotaController;
use App\Http\Controllers\Backend\AlunoController;
use App\Http\Controllers\Backend\TurmaController;
use App\Http\Controllers\Backend\RelatorioController;
use App\Http\Controllers\Backend\PerfilController;

/*
|--------------------------------------------------------------------------
| ROTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');

Route::get('/formulario', [FormularioController::class, 'index'])->name('formulario.index');
Route::post('/formulario', [FormularioController::class, 'store'])->name('formulario.store');

/*
|--------------------------------------------------------------------------
| AUTENTICAÇÃO (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| BACKEND (PROTEGIDO)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('backend')->name('backend.')->group(function () {

    /*
    |-------------------------
    | Dashboard
    |-------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |-------------------------
    | Notas
    |-------------------------
    */
    Route::get('/notas', [NotaController::class, 'index'])->name('notas.index');
    Route::get('/notas/criar', [NotaController::class, 'create'])->name('notas.create');
    Route::post('/notas', [NotaController::class, 'store'])->name('notas.store');
    Route::get('/notas/{nota}/editar', [NotaController::class, 'edit'])->name('notas.edit');
    Route::put('/notas/{nota}', [NotaController::class, 'update'])->name('notas.update');
    Route::delete('/notas/{nota}', [NotaController::class, 'destroy'])->name('notas.destroy');

    /*
    |-------------------------
    | Alunos
    |-------------------------
    */
    Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
    Route::get('/alunos/criar', [AlunoController::class, 'create'])->name('alunos.create');
    Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');

    /*
    |-------------------------
    | Turmas
    |-------------------------
    */
    Route::get('/turmas', [TurmaController::class, 'index'])->name('turmas.index');
    Route::get('/turmas/criar', [TurmaController::class, 'create'])->name('turmas.create');
    Route::post('/turmas', [TurmaController::class, 'store'])->name('turmas.store');
    Route::get('/turmas/{turma}/editar', [TurmaController::class, 'edit'])->name('turmas.edit');
    Route::put('/turmas/{turma}', [TurmaController::class, 'update'])->name('turmas.update');
    Route::delete('/turmas/{turma}', [TurmaController::class, 'destroy'])->name('turmas.destroy');

    /*
    |-------------------------
    | Relatórios
    |-------------------------
    */
    Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');

    /*
    |-------------------------
    | Configurações
    |-------------------------
    */
    Route::get('/configuracoes', fn () => view('backend.configuracoes'))
        ->name('configuracoes');
    
    /*
    |--------------------------
    | Cursos
    |--------------------------
    */
    Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('/cursos/criar', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/{curso}/editar', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

    /*
    |-------------------------
    | Eventos
    |-------------------------
    */
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/criar', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');

});

Route::fallback(function () {
    return response()->view('erros.404', [], 404);
});
