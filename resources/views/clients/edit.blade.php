@extends('layout')

@section('title', 'Cadastrar cliente')

@section('content')
    <div class="row mt-3">
        <div class="col-sm-12">
            <h3>Edição de cliente</h3>
            @include('errors')
            <form method="POST" action="/clients/update/{{ $client->id }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nome" class="col-sm-2 col-form-label"><strong>Nome *</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="nome" name="name" value="{{ $client->name }}" placeholder="O nome do cliente" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 col-form-label"><strong>E-mail *</strong></label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" placeholder="O endereço de e-mail do cliente" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">
                    <i class="fa fa-save"></i> Atualizar
                </button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col-sm-12">
            <h5>Novo número de telefone</h5>
            @include('success-message')
            <form method="POST" action="/clients/{{ $client->id }}/phones">
                @csrf
                <div class="form-group">
                    <label for="phone" class="col-sm-2 col-form-label"><strong>Telefone *</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Número do novo telefone" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success ml-3" id="btnAddPhone" disabled>
                    <i class="fa fa-plus"></i> Adicionar
                </button>
            </form>
            </div>
        </div>
        <br>
        <div class="col-sm-12">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">Telefone</th>
                    <th class="text-center" style="width: 10%"></th>
                    <th class="text-center" style="width: 10%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($client->phones as $phone)
                    <tr>
                        <td>{{ $phone->phone }}</td>
                        <td>
                            <button class="btn btn-info"><i class="fa fa-edit"></i></button>
                        </td>
                        <td>
                            <form method="POST" action="/phones/{{ $phone->id }}" onsubmit="return confirm('Tem certeza que deseja excluir este telefone?')">
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

    <script>
        let btnAddPhone = document.querySelector('#btnAddPhone');

        let inputPhone = document.querySelector('#phone');
        inputPhone.addEventListener('keyup', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            btnAddPhone.disabled = this.value.trim().length <= 0;
        });
    </script>
@endsection
