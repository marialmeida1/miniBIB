@extends('layouts.main')
@section('title', 'Mini BIB :P - Alunos')
@section('titleName', 'Lista de Alunos')
@section('content')

<div class="mb-3">
    <a href="{{ route('alunos.create') }}">
        <button class="btn btn-sm btn-success">Novo aluno</button>
    </a>
    <a href="/">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Endereço</th>
                <th width="160">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->matricula }}</td>
                <td>{{ $aluno->endereco }}</td>
                <td>
                    <a href="{{ route('alunos.edit', [$aluno->id]) }}"><button class="btn btn-secondary btn-sm">Editar</button></a>
                    <a href="{{ route('alunos.delete', [$aluno->id]) }}"><button class="btn btn-danger btn-sm">Excluir</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex">
    {!! $alunos->links() !!}
</div>

@endsection