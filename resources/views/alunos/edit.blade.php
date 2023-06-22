@extends('layouts.main')
@section('title', 'Editar Alunos')
@section('titleName', 'Editando: ' . $aluno->nome)
@section('content')


<div>
    <a href="{{ route('alunos.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3" action="{{ route('alunos.update', [$aluno->id]) }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do aluno" value="{{ $aluno->nome }}">
        <label for="floatingInput">Nome do aluno</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matrícula" value="{{ $aluno->matricula }}">
        <label for="floatingInput">Número de matrícula</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço" value="{{ $aluno->endereco }}">
        <label for="floatingInput">Endereço</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Salvar" />
</form>

@endsection