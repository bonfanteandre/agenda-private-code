@extends('layout')

@section('title', 'Cadastrar cliente')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <h3>Cadastro de cliente</h3>
            @include('errors')
            <form method="POST" action="/clients/store">
                @csrf
                <div class="col-4">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="name" value="{{ old('name') }}" placeholder="O nome do cliente" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="O endereço de e-mail do cliente" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
            </form>
        </div>
    </div>
@endsection
