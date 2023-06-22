@extends('layouts.main')
@section('title', 'Adicionando Novo Telefone')
@section('titleName', 'Adicionar Novo Telefone')
@section('content')
<div>
    <a href="{{ route('telefones.index') }}">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<form class="mt-3" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="aluno" id="aluno" placeholder="Alunos">
            @foreach ($alunos as $nome => $id)
            <option value="{{ $id }}">{{ $nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do telefone" required>
        <label for="floatingInput">Nome do Telefone</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="numero" id="numero" placeholder="Número" required>
        <label for="floatingInput">Número</label>
    </div>


    <input type="submit" class="btn btn-primary" value="Salvar" />
</form>

@endsection