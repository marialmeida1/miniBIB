@extends('layouts.main')
@section('title', 'Editar Empréstimos')
@section('titleName', 'Editando' )
@section('content')

<div>
    <a href="{{ route('emprestimos.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3"
    action="{{ route('emprestimos.update', [$emprestimo->aluno_id, $emprestimo->livro_id, $emprestimo->datahora] ) }}"
    method="POST">
    @csrf
    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="aluno" id="aluno" placeholder="Alunos">

            @foreach ($aluno_emprestimo as $nome => $id)
            <option value="{{ $id }}">{{ $nome }}</option>
            @endforeach

            @foreach ($alunos as $nome => $id)
            <option value="{{ $id }}">{{ $nome }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="livro" id="livro" placeholder="Livros">

            @foreach ($livro_emprestimo as $nome => $id)
            <option value="{{ $id }}">{{ $nome }}</option>
            @endforeach

            @foreach ($livros as $nome => $id)
            <option value="{{ $id }}">{{ $nome }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="datetimepicker" placeholder="Selecione uma data e hora:"
            name="entrada" value="{{ $emprestimo->datahora }}">
        <label for=" floatingInput">Selecione a data de início do empréstimo</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="datetimepicker" placeholder="Selecione uma data e hora:"
            name="saida" value="{{ $emprestimo->data_devolucao }}">
        <label for="floatingInput">Selecione uma data e hora para o fim do empréstimo</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Salvar" />
</form>

@endsection