@extends('layouts.main')
@section('title', 'Editar Telefones')
@section('titleName', 'Editando' )
@section('content')

<div>
    <a href="{{ route('telefones.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3" action="{{ route('telefones.update', [$telefone->id]) }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="aluno" id="aluno" placeholder="Alunos">

            @foreach ($nome_telefone as $nome => $id)
            <option value="{{ $id }}">{{ $nome }}</option>
            @endforeach

            @foreach ($alunos as $nome => $id)
            <option value="{{ $id }}">{{ $nome }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do telefone" value="{{ $telefone->nome }}">
        <label for="floatingInput">Nome do aluno</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="numero" id="numero" placeholder="Número" value="{{ $telefone->numero }}">
        <label for="floatingInput">Número de matrícula</label>
    </div>


    <input type="submit" class="btn btn-primary" value="Salvar" />
</form>

@endsection