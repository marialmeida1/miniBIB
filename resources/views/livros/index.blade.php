@extends('layouts.main')
@section('title', 'Mini BIB :P - Livros')
@section('titleName', 'Lista de Livros')
@section('content')

<div class="mb-3">
    <a href="{{ route('livros.create') }}">
        <button class="btn btn-sm btn-success">Novo livro</button>
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
                <th scope="col">Autor</th>
                <th scope="col">ISBN</th>
                <th width="160">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
            <tr>
                <td>{{ $livro->id }}</td>
                <td>{{ $livro->nome }}</td>
                <td>{{ $livro->autor }}</td>
                <td>{{ $livro->isbn }}</td>
                <td>
                    <a href="{{ route('livros.edit', [$livro->id]) }}"><button class="btn btn-secondary btn-sm">Editar</button></a>
                    <a href="{{ route('livros.delete', [$livro->id]) }}"><button class="btn btn-danger btn-sm">Excluir</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex">
    {!! $livros->links() !!}
</div>

@endsection