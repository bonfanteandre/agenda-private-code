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

    <hr>

    <div class="row mt-3">
        <div class="col-sm-12">
            <h5>Lista de telefones</h5>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Telefone</th>
                    <th class="text-center" style="width: 10%"></th>
                    <th class="text-center" style="width: 10%"></th>
                    <th class="text-center" style="width: 10%"></th>
                    <th class="text-center" style="width: 10%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($client->phones as $phone)
                    <tr>
                        <td>
                            <span id="phone-number-text-{{ $phone->id }}">{{ $phone->phone }}</span>
                            <div class="input-group w-90" hidden id="phone-number-input-{{ $phone->id }}">
                                <input type="text" class="form-control" value="{{ $phone->phone }}">
                                <div class="input-group-append">
                                    <button class="btn btn-success" onclick="updatePhone({{ $phone->id }})">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    @csrf
                                </div>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-primary" target="_blank" href="tel:{{ $phone->phone }}">
                                <i class="fa fa-phone"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" target="_blank" href="https://api.whatsapp.com/send?1=pt_BR&phone={{ $phone->phone }}">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-info" onclick="toggleEditPhone({{ $phone->id }})">
                                <i class="fa fa-edit"></i>
                            </button>
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

        function toggleEditPhone(phoneId) {
            const inputPhoneNumber = document.querySelector(`#phone-number-input-${phoneId}`);
            const textPhoneNumber = document.querySelector(`#phone-number-text-${phoneId}`);

            if (textPhoneNumber.hasAttribute('hidden')) {
                inputPhoneNumber.hidden = true;
                textPhoneNumber.removeAttribute('hidden');
            } else {
                inputPhoneNumber.removeAttribute('hidden');
                textPhoneNumber.hidden = true;
            }
        }

        function updatePhone(phoneId) {

            const token = document.querySelector('input[name="_token"]').value;
            const phone = document.querySelector(`#phone-number-input-${phoneId} > input`).value;

            let formData = new FormData();
            formData.append('_token', token);
            formData.append('id', phoneId);
            formData.append('phone', phone);

            const url = `/phones/${phoneId}`;
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleEditPhone(phoneId);
                document.querySelector(`#phone-number-text-${phoneId}`).textContent = phone;
            });
        }
    </script>
@endsection
