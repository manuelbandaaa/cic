@extends('layouts.app')

@section('actions')
@if(\Auth::user()->position_id == 1)
    <div class="row">
        <div class="col-md-12">
            @if($course->status)
                <a href="{{ route('courses.remove', [$course->id, 0]) }}" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Dar de Baja Taller</a>
            @else
                <a href="{{ route('courses.remove', [$course->id, 1]) }}" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Habilitar taller</a>
            @endif
        </div>
    </div>
@endif
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox{{ $colapsado or '' }}">
            <div class="ibox-title">
                <h5>{{ $course->name }}</h5>
                <div class="ibox-tools">
                    @if(\Auth::user()->position_id == 1)
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Editar</a>
                    @endif
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th class="text-center">Impartido por</th>
                        <th class="text-center">Día</th>
                        <th class="text-center">Hora</th>
                        <th class="text-center">Lugar</th>
                        <th class="text-center">Número de Participantes</th>
                        <th class="text-center">Promedio por clase</th>
                        <th class="text-center">Estatus</th>
                        </tr>
                    </thead>
                    <tr>
                        <td class="text-center">{{ $course->user->name }}</td>
                        <td class="text-center">{{ $course->day }}</td>
                        <td class="text-center">{{ $course->time }}</td>
                        <td class="text-center">{{ $course->place }}</td>
                        <td class="text-center">{{ $course->numParticipants }}</td>
                        <td class="text-center">{{ $course->average }}</td>
                        <td class="text-center">{{ $course->status ? "Activo" : "Inactivo" }}</td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Información del Taller</h5>
                <div class="ibox-tools">
                    @if(\Auth::user()->position_id == 3 && \Auth::user()->id == $course->user_id)
                        <a href="{{ action('CoursesController@editInfo', $course->id) }}" class="btn btn-primary btn-xs">Editar</a>
                    @endif
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <p><strong>Descripcion</strong></p>
                <p class="text-justify">{{ $course->description }}</p>
                <p><strong>Imagen de perfil del taller</strong></p>
                <img src="{{ $course->img }}" style="display: block; max-width:230px; max-height:95px; width: auto; height: auto;">
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de Asistencia</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <a class="btn btn-primary" href="{{ action('AttendanceController@getList', $course->user->id) }}">Ver listas de asistencia</a>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Plan de Trabajo</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <a class="btn btn-primary" href="{{ action('PlanningController@show', $course->user->id) }}">Ver Plan de Trabajo</a>
            </div>
        </div>
    </div>
</div>
@endsection