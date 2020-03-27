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
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center" style="width: 10%">Telefones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td class="text-center" style="width: 10%">{{ $client->phones->count() }}</td>
                        </tr>
                    @endforeach
                <tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
