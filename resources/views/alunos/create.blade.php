@extends('layouts.main')
@section('title', 'Criando Novo Aluno')
@section('titleName', 'Criar Novo Aluno')
@section('content')
<div>
    <a href="{{ route('alunos.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do aluno" required>
        <label for="floatingInput">Nome do aluno</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Matrícula" required>
        <label for="floatingInput">Número de matrícula</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
        <label for="floatingInput">Endereço</label>
    </div>

    <input type="submit" class="btn btn-primary" value="Salvar" />
</form>

@endsection