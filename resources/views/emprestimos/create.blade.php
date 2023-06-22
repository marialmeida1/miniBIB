@extends('layouts.main')
@section('title', 'Adicionando Novo Empréstimo')
@section('titleName', 'Adicionar Novo Empréstimo')
@section('content')
<div>
    <a href="{{ route('emprestimos.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="aluno" id="aluno" placeholder="Alunos">
            @foreach ($alunos as $nome => $id)
            <option value="{{ $id }}" required>{{ $nome }}</option>
            @endforeach
    </div>
    </select>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="livro" id="livro" placeholder="Livros">
            @foreach ($livros as $nome => $id)
            <option value="{{ $id }}" required>{{ $nome }}</option>
            @endforeach
    </div>
    </select>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="datetimepicker" placeholder="Selecione uma data e hora:" name="entrada" required>
        <label for="floatingInput">Selecione a data de início do empréstimo</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="datetimepicker" placeholder="Selecione uma data e hora:" name="saida">
        <label for="floatingInput">Selecione uma data e hora para o fim do empréstimo</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Salvar" />


</form>



@endsection