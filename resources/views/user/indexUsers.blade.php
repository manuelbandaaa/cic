@extends('layouts.app')
@section('css') 
    @include('snippets.data-table-css') 
@stop

@section('breadcrumb')
    <li><a href="{{ route('users.index') }}"><strong>Usuarios</strong></a></li>
@endsection

@section('actions')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nuevo Usuario</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Información de Usuarios</h5>
            </div>
            <div class="ibox-content">
                @if(count($users) > 0)
                    <table class="table table-striped table-bordered" id="usuarios">
                        <thead>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $valor)
                            <tr>
                                <td><a href="{{ route('users.show', $valor->id) }}"> {{ $valor->name }}</a></td>
                                <td>{{ $valor->email }}</td>
                                <td>{{ $valor->position()->first()->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>No hay usuarios registrados</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts') 
    @include('snippets.data-table-js', ['tablaId' => 'usuarios', 'opciones' => json_encode(['paging' => false])]) 
@stop 
