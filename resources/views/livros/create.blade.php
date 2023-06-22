@extends('layouts.main')
@section('title', 'Adicionando Novo Livro')
@section('titleName', 'Adicionar Novo Livro')
@section('content')
<div>
    <a href="{{ route('livros.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do aluno" required>
        <label for="floatingInput">Nome do livro</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="autor" id="autor" placeholder="Matrícula" required>
        <label for="floatingInput">Nome do autor</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Endereço">
        <label for="floatingInput">ISBN</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Salvar" />
</form>

@endsection