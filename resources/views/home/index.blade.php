@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1>Olá, usuário!</h1>
                <p>Seja bem-vindo à agenda telefônica. Aqui você poderá gerenciar seus clientes e seus telefones.</p>
                <hr>
                <a href="/clients" class="btn btn-primary">
                    <i class="fa fa-users"></i>
                    Clique aqui para ver os clientes cadastrados
                </a>
            </div>
        </div>
    </div>
@endsection
