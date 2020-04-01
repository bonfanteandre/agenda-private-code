@extends('layout')

@section('title', 'Usuários')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h3>Usuários cadastrados</h3>
            <a href="/users/create" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
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
                    <th class="text-center" style="width: 1%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/users/{{ $user->id }}" class="btn btn-info">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
