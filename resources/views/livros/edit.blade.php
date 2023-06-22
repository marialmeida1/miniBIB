@extends('layouts.main')
@section('title', 'Editar Livros')
@section('titleName', 'Editando: ' . $livro->nome)
@section('content')

<div>
    <a href="{{ route('livros.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3" action="{{ route('livros.update', [$livro->id]) }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do livro" value="{{ $livro->nome }}">
        <label for="floatingInput">Nome do livro</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor do Livro" value="{{ $livro->autor }}">
        <label for="floatingInput">Autor do Livro</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Endereço" value="{{ $livro->isbn }}">
        <label for="floatingInput">ISBN</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Salvar" />
</form>

@endsection