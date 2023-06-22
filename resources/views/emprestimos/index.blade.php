@extends('layouts.main')
@section('title', 'Mini BIB :P - Empréstimos')
@section('titleName', 'Lista de Empréstimos')
@section('content')

<div class="mb-3">
    <a href="{{ route('emprestimos.create') }}">
        <button class="btn btn-sm btn-success">Novo Empréstimo</button>
    </a>
    <a href="/">
        <button class="btn btn-sm btn-secondary">Voltar</button>
    </a>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Aluno</th>
                <th scope="col">Livro</th>
                <th scope="col">Empréstimo</th>
                <th scope="col">Devolução</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprestimos as $emprestimo)
            <tr>
                <td>{{ $alunos[$emprestimo->aluno_id] }}</td>
                <td>{{ $livros[$emprestimo->livro_id] }}</td>
                <td>{{ $emprestimo->datahora }}</td>
                <td>{{ $emprestimo->data_devolucao }}</td>
                <td>
                    <a href="{{ route('emprestimos.edit', [$emprestimo->aluno_id, $emprestimo->livro_id, $emprestimo->datahora]) }}"><button class="btn btn-secondary btn-sm">Editar</button></a>
                    <a href="{{ route('emprestimos.delete', [$emprestimo->aluno_id, $emprestimo->livro_id, $emprestimo->datahora]) }}"><button class="btn btn-danger btn-sm">Excluir</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex">
    {!! $emprestimos->links() !!}
</div>

@endsection