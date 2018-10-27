@extends('layouts.app')

@section('breadcrumb')
    <li><a href="{{ route('users.index') }}"><strong>Usuarios</strong></a></li>
    <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
@endsection

@section('actions')
@if(\Auth::user()->position_id == 1 || \Auth::user()->id == $user->id)
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar Información</a>
    </div>
</div>
@endif
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Información de Usuario</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                <table class="table border">
                    <thead>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Edad</th>
                        <th>Teléfono</th>
                        <th>Domicilio</th>
                        @if($user->position()->first()->id > 2)
                            <th>Escolaridad</th>
                        @endif
                        <th>Cargo</th>
                        @if($user->position_id == 3 && ($user->degree == 'Preparatoria' || $user->degree == 'Universidad'))
                        <th>Monto</th>
                        @endif
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                            @if (preg_match('/\invalido\b/',$user->email))
                                    N/A
                                @else
                                    {{ $user->email }}
                                @endif
                            </td>
                            <td>{{ $user->age }}</td>
                            <td>{{ $user->cellphone }}</td>
                            <td>{{ $user->address }}</td>
                            @if($user->position()->first()->id > 2)
                                <td>{{ $user->degree }}</td>
                            @endif
                            <td>{{ $user->position()->first()->name }}</td>
                            @if($user->position_id == 3 && ($user->degree == 'Preparatoria' || $user->degree == 'Universidad'))
                            <td>{{$user->pay ? $user->pay : 'Sin especificar'}}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

@if(\Auth::user()->position_id < 3 && $user->position_id == 3 && ($user->degree == 'Preparatoria' || $user->degree == 'Universidad'))
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Reportes Mensuales de {{ $user->name }}</h5>
            </div>
            <div class="ibox-content">
                @if(count($user->reports)>0)
                    <table class="table border">
                        <thead>
                            <th>Mes</th>
                            <th>Fecha de Creación</th>
                        </thead>
                        <tbody>
                            @foreach($user->reports as $report)
                            <tr>
                                <td><a href="{{ route('reports.show', $report->id) }}">{{ $report->month }}</a></td>
                                <td>{{ \Date::parse($report->created_at)->format('l j F Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    El usuario no ha escrito ningún reporte todavía.
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection