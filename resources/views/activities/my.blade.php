@extends('layout')

@section('title', 'Meu registro de atividades')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h3>Meu registro de atividades</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-responsive-lg">
                <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th class="text-center" style="width: 20%">Data/Hora</th>
                    <th class="text-center" style="width: 1%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td>{{ $activity->event }}</td>
                        <td class="text-center">{{ $activity->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="/activities/{{ $activity->id }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
