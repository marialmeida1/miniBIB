<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\TelefoneController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rota Principal
Route::get('/', function () {
    return view('welcome');
});

// Alunos
Route::get('/alunos',               [AlunoController::class, 'index'])->name('alunos.index');
Route::get('/alunos/create',        [AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos/create',       [AlunoController::class, 'store'])->name('alunos.store');
Route::get('/alunos/edit/{id}',     [AlunoController::class, 'edit'])->name('alunos.edit');
Route::post('/alunos/update/{id}',  [AlunoController::class, 'update'])->name('alunos.update');
Route::get('/alunos/delete/{id}',   [AlunoController::class, 'delete'])->name('alunos.delete');

// Livros
Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::get('/livros/create', [LivroController::class, 'create'])->name('livros.create'); // leva para pag de create
Route::post('/livros/create', [LivroController::class, 'store'])->name('livros.store'); // Cria o forms para a criação (post)
Route::get('/livros/edit/{id}', [LivroController::class, 'edit'])->name('livros.edit'); // Leva para o update
Route::post('/livros/edit/{id}', [LivroController::class, 'update'])->name('livros.update'); // Realmente atualiza
Route::get('/livros/delete/{id}', [LivroController::class, 'delete'])->name('livros.delete');


// Telefones
Route::get('/telefones', [TelefoneController::class, 'index'])->name('telefones.index');
Route::get('/telefones/create', [TelefoneController::class, 'create'])->name('telefones.create'); // leva para pag de create
Route::post('/telefones/create', [TelefoneController::class, 'store'])->name('telefones.store'); // Cria o forms para a criação (post)
Route::get('/telefones/edit/{id}', [TelefoneController::class, 'edit'])->name('telefones.edit'); // Leva para o update
Route::post('/telefones/edit/{id}', [TelefoneController::class, 'update'])->name('telefones.update'); // Realmente atualiza
Route::get('/telefones/delete/{id}',   [TelefoneController::class, 'delete'])->name('telefones.delete');

// Emprestimo
Route::get('/emprestimos', [EmprestimoController::class, 'index'])->name('emprestimos.index');
Route::get('/emprestimos/create', [EmprestimoController::class, 'create'])->name('emprestimos.create'); // leva para pag de create
Route::post('/emprestimos/create', [EmprestimoController::class, 'store'])->name('emprestimos.store'); // Cria o forms para a criação (post)
Route::get('/emprestimos/edit/{aluno_id}/{livro_id}/{datahora}', [EmprestimoController::class, 'edit'])->name('emprestimos.edit'); // Leva para o update
Route::post('/emprestimos/edit/{aluno_id}/{livro_id}/{datahora}', [EmprestimoController::class, 'update'])->name('emprestimos.update'); // Realmente atualiza
Route::get('/emprestimos/delete/{aluno_id}/{livro_id}/{datahora}',   [EmprestimoController::class, 'delete'])->name('emprestimos.delete');
