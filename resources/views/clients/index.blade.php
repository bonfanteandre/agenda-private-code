@extends('layout')

@section('title', 'Clientes')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h3>Clientes cadastrados</h3>
            <a href="/clients/create" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('success-message')
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center" style="width: 10%">Telefones</th>
                    <th class="text-center" style="width: 10%"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td class="text-center" style="width: 10%">{{ $client->phones->count() }}</td>
                            <td>
                                <a href="/clients/{{ $client->id }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                <tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
