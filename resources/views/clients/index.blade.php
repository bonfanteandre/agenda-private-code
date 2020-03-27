@extends('layout')

@section('title', 'Clientes')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h3>Cadastro de clientes</h3>
            <a href="/clients/create" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('success-message')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" style="width: 5%">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <th scope="row" style="width: 5%">{{ $client->id }}</th>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phones->count() }}</td>
                        </tr>
                    @endforeach
                <tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
