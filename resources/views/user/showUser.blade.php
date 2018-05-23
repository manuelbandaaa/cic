@extends('layouts.app')

@section('breadcrumb')
    <li><a href="{{ route('users.index') }}"><strong>Usuarios</strong></a></li>
    <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
@endsection

@section('actions')
<div class="row">
    <div class="col-sm-12">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar Información</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Información de Usuario</h5>
            </div>
            <div class="ibox-content">
                <table class="table border">
                    <thead>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->position()->first()->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection