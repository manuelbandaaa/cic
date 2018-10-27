@extends('layouts.app')

@section('css')
    @include('snippets.data-table-css')
    @include('snippets.select2-css')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Listado de Talleres</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if( count($courses) > 0 )
                    <table class="table table-striped table-bordered table-hover" id="tbCourses">
                        <thead>
                            <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Impartido por</th>
                            <th class="text-center">Asistentes/Clase</th>
                            <th class="text-center">Dia</th>
                            <th class="text-center">Horario</th>
                            <th class="text-center">Lugar</th>
                            <th class="text-center">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                @if(!$course->status)
                                    <td class="text-center alert-danger"><a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a></td>
                                    <td class="text-center alert-danger">
                                      @if(isset($course->user))
                                        <a href="{{ route('users.show', $course->user->id) }}">{{ $course->user->name }}</a>
                                      @endif
                                    </td>
                                    <td class="text-center alert-danger">{{ $course->average }}</td>
                                    <td class="text-center alert-danger">{{ $course->day }}</td>
                                    <td class="text-center alert-danger">{{ $course->time }}</td>
                                    <td class="text-center alert-danger">{{ $course->place }}</td>
                                    <td class="text-center alert-danger">{{ $course->status? 'Activo' : "Inactivo" }}</td>
                                @elseif($course->average < 5 && $course->numParticipants >0)
                                    <td class="text-center alert-warning"><a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a></td>
                                    <td class="text-center alert-warning">
                                      @if(isset($course->user))
                                        <a href="{{ route('users.show', $course->user->id) }}">{{ $course->user->name }}</a>
                                      @endif
                                    </td>
                                    <td class="text-center alert-warning">{{ $course->average }}</td>
                                    <td class="text-center alert-warning">{{ $course->day }}</td>
                                    <td class="text-center alert-warning">{{ $course->time }}</td>
                                    <td class="text-center alert-warning">{{ $course->place }}</td>
                                    <td class="text-center alert-warning">{{ $course->status? 'Activo' : "Inactivo" }}</td>

                                @else
                                    <td class="text-center"><a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a></td>
                                    <td class="text-center">
                                      @if(isset($course->user))
                                        <a href="{{ route('users.show', $course->user->id) }}">{{ $course->user->name }}</a>
                                      @endif
                                    </td>
                                    <td class="text-center">{{ $course->average }}</td>
                                    <td class="text-center">{{ $course->day }}</td>
                                    <td class="text-center">{{ $course->time }}</td>
                                    <td class="text-center">{{ $course->place }}</td>
                                    <td class="text-center">{{ $course->status? 'Activo' : "Inactivo" }}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @else
                        <div class="alert alert-info">
                            No hay talleres registrados
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('snippets.data-table-js', ['tablaId' => 'tbCourses', 'opciones' => json_encode(['paging' => true, 'pageLength' => 50])])
@endsection
