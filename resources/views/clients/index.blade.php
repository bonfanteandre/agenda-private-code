@extends('layout')

@section('title', 'Clientes')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h3>Clientes cadastrados</h3>
            <a href="/clients/create" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <form method="GET" action="/clients">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nome, e-mail ou telefone" name="q" value="{{ request('q') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('success-message')
            <table class="table table-striped table-responsive-lg">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center" style="width: 1%">Telefones</th>
                    <th class="text-center" style="width: 1%"></th>
                    <th class="text-center" style="width: 1%"></th>
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
                            <td>
                                <form method="POST" action="/clients/{{ $client->id }}" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                <tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
