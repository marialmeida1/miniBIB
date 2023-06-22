@extends('layouts.main')
@section('title', 'Mini BIB :P')
@section('titleName', 'Bem-vindo(a)!')
@section('content')

<div class="row py-4">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alunos</h5>
                <p class="card-text">Tenha acesso a lista de alunos! Caso necessário você poderá alterar ou adicionar
                    mais alunos.</p>
                <a href="{{ route('alunos.index') }}" class="btn btn-success">Ir para alunos.</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Livros</h5>
                <p class="card-text">Tenha acesso a lista de livros! Caso necessário você poderá alterar ou adicionar
                    mais livros.</p>
                <a href="{{ route('livros.index') }}" class="btn btn-success">Ir para livros.</a>
            </div>
        </div>
    </div>
</div>

<div class="row py-4">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Telefones</h5>
                <p class="card-text">Tenha acesso a lista de telefones! Caso necessário você poderá alterar ou adicionar
                    mais telefones.</p>
                <a href="{{ route('telefones.index') }}" class="btn btn-success">Ir para telefones.</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Empréstimos</h5>
                <p class="card-text">Tenha acesso a lista de empréstimos! Caso necessário você poderá alterar ou
                    adicionar
                    mais empréstimos.</p>
                <a href="{{ route('emprestimos.index') }}" class="btn btn-success">Ir para empréstimos.</a>
            </div>
        </div>
    </div>
</div>
@endsection