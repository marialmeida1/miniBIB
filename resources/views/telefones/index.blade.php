@extends('layouts.main')
@section('title', 'Mini BIB :P - Telefones')
@section('titleName', 'Lista de Telefones')
@section('content')

<div class="mb-3">
    <a href="{{ route('telefones.create') }}">
        <button class=" btn btn-sm btn-success">Novo Telefone</button>
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
                <th scope="col">Dono do Telefone</th>
                <th scope="col">Nome do Telefone</th>
                <th scope="col">Número</th>
                <th width="160">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($telefones as $telefone)
            <tr>
                <td>{{ $telefone->id }}</td>
                <td>{{ $nomes[$telefone->aluno_id] }}</td>
                <td>{{ $telefone->nome }}</td>
                <td>{{ $telefone->numero }}</td>
                <td>
                    <a href="{{ route('telefones.edit', [$telefone->id]) }}"><button class="btn btn-secondary btn-sm">Editar</button></a>
                    <a href="{{ route('telefones.delete', [$telefone->id]) }}"><button class="btn btn-danger btn-sm">Excluir</button></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

<div class="d-flex">
    {!! $telefones->links() !!}
</div>


@endsection