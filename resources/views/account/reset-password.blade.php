@extends('layout')

@section('title', 'Alterar senha')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <h3>Atualizar senha</h3>
            @include('errors')
            @include('success-message')
            <form method="POST" action="/account/password/reset">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="password" class="col-sm-2 col-form-label"><strong>Senha *</strong></label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirmation" class="col-sm-2 col-form-label"><strong>Confirmação *</strong></label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id=password-confirmation" name="password_confirmation" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
            </form>
        </div>
    </div>
@endsection
