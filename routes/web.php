<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UsuarioController, ProjetoController,TaskController};

use App\Http\Controllers\TarefaController;








    Route::get('/tarefa',[TarefaController::class,'index'])->name('tarefa.index');
    Route::get('/tarefa/cadastro', [TarefaController::class, 'viewCadastro'])->name('cadastro-tarefa');
    Route::get('/tarefa/editar/{id}', [TarefaController::class, 'viewEditar'])->name('edita-tarefa');
    Route::post('/tarefa', [TarefaController::class, 'cadastrarTarefa'])->name('cadastrarTarefa');
    Route::put('/tarefa', [TarefaController::class, 'editarTarefa'])->name('editarTarefa');
    Route::delete('/tarefa/{id}', [TarefaController::class, 'delete'])->name('deleta-tarefa');


Route::get('/tarefaAddDev/{id}',[TarefaController::class,'adicionarDevTarefa'])->name('tarefaAddDev');
Route::get('/tarefaRemoveDev/{id}',[TarefaController::class,'removerDevTarefa'])->name('tarefaRemoveDev');



Route::get('/usuario',[UsuarioController::class,'index'])->name('usuario.index');
Route::get('/usuario/cadastrar', [UsuarioController::class, 'viewCadastrar'])->name('novo-usuario');
Route::get('/usuario/{id}', [UsuarioController::class, 'viewEditar'])->name('edita-usuario');
Route::post('/usuario', [UsuarioController::class, 'cadastrarUsuario'])->name('cadastrarUsuario');
Route::put('/usuario', [UsuarioController::class, 'editarUsuario'])->name('editarUsuario');
Route::delete('/usuario/{id}', [UsuarioController::class, 'delete'])->name('deleta-usuario');




Route::get('/projeto',[ProjetoController::class,'index'])->name('projeto.index');
Route::get('/projeto/cadastrar', [ProjetoController::class, 'viewCadastro'])->name('cadastro-projeto');
Route::get('/projeto/editar/{id}', [ProjetoController::class, 'viewEditar'])->name('edita-projeto');
Route::post('/projeto',[ProjetoController::class,'cadastrarProjeto'])->name('cadastrarProjeto');
Route::put('/projeto', [ProjetoController::class, 'editarProjeto'])->name('editarProjeto');
Route::delete('/projeto/{id}', [ProjetoController::class, 'delete'])->name('deleta-projeto');




Route::get('/', function () {
    return view('welcome');
});
