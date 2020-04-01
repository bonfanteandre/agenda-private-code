@extends('layout')

@section('title', 'Cadastro de usuário')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <h3>Cadastro de usuário</h3>
            @include('errors')
            <form method="POST" action="/users/store">
                @csrf
                <div class="form-group">
                    <label for="nome" class="col-sm-2 col-form-label"><strong>Nome *</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nome" name="name" value="{{ old('name') }}" placeholder="O nome do usuário" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 col-form-label"><strong>E-mail *</strong></label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="O endereço de e-mail do usuário" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 col-form-label"><strong>Senha *</strong></label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" name="password" placeholder="A senha do cliente" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-2 col-form-label"><strong>Confirmar senha *</strong></label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar a senha do cliente" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_group" class="col-sm-2 col-form-label"><strong>Grupo *</strong></label>
                    <div class="col-sm-12">
                        <select name="user_group_id" id="user_group" class="form-control" required>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
            </form>
        </div>
    </div>
@endsection
