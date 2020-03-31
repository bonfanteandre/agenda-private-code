@extends('layout')

@section('title', 'Grupos de usuários')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h3>Grupos de usuários cadastrados</h3>
            <a href="/groups/create" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('success-message')
            <table class="table table-striped table-responsive-lg">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th class="text-center" style="width: 1%"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->name }}</td>
                            <td>
                                <a href="/groups/{{ $group->id }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                <tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
