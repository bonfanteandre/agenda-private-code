@extends('layout')

@section('title', 'Visualizando registro de atividade')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h3>Registro de atividades</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>{{ $activity->event }}</h3>
            <p>Data/Hora: {{ $activity->created_at->format('d/m/Y H:i:s') }}</p>
            <p>Dados do evento: </p>
            <pre style="max-height: 300px; overflow-y: scroll;">{{ $activity->content }}</pre>
        </div>
    </div>
@endsection
