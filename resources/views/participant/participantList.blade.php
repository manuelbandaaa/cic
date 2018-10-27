@extends('layouts.app')
@section('css') 
    @include('snippets.data-table-css') 
@stop

@section('actions')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('participants.create') }}" class="btn btn-primary btn-sm">Registrar Participante</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Información de los Participantes</h5>
            </div>
            <div class="ibox-content">
                @if(count($participants) > 0)
                    <table class="table table-striped table-bordered" id="usuarios">
                        <thead>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Domicilio</th>
                            <th>Teléfono</th>
                            <th class="text-center">Editar</th>
                        </thead>
                        <tbody>
                            @foreach($participants as $participant)
                            <tr>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->age }}</td>
                                <td>{{ $participant->address }}</td>
                                <td>{{ $participant->cellphone}}</td>
                                <td class="text-center">
                                    <a href="{{ action('ParticipantsController@edit', $participant->id) }}" class="btn btn-xs btn-outline btn-warning">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>No hay participantes registrados</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts') 
    @include('snippets.data-table-js', ['tablaId' => 'usuarios', 'opciones' => json_encode(['paging' => false])]) 
@stop 
