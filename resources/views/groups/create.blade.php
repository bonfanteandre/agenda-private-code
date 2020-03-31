@extends('layout')

@section('title', 'Cadastrar grupo de usuários')

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <h3>Cadastro de grupo de usuários</h3>
            @include('errors')
            <form method="POST" action="/groups/store">
                @csrf
                <div class="form-group">
                    <label for="nome" class="col-sm-2 col-form-label"><strong>Nome *</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nome" name="name" value="{{ old('name') }}" placeholder="O nome do cliente" required>
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="can_view_phones" name="can_view_phones">
                    <label class="form-check-label" for="can_view_phones">Pode visualizar telefones</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="can_edit_phones" name="can_edit_phones">
                    <label class="form-check-label" for="can_edit_phones">Pode editar telefones</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="can_delete_phones" name="can_delete_phones">
                    <label class="form-check-label" for="can_delete_phones">Pode excluir telefones</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="can_view_activities" name="can_view_activities">
                    <label class="form-check-label" for="can_view_activities">Pode visualizar registros de atividades</label>
                </div>

                <br>

                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
            </form>
        </div>
    </div>
@endsection
