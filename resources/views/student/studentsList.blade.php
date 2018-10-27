@extends('layouts.app')

@section('css')
    @include('snippets.data-table-css')
    @include('snippets.select2-css')
@stop

@section('actions')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-outline btn-primary dim" type="button" href="{{ action('StudentsController@generate_excel') }}">
                <i class="fa fa-file-excel-o" aria-hidden="true"></i> Descargar Excel IJAS
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Listado de Becados - {{ $type }}</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if( count($students) > 0 )
                    <table class="table table-striped table-bordered table-hover" id="tbCandidates">
                        <thead>
                            <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Edad</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Domicilio</th>
                            @if($type == 'Preparatoria' || $type == 'Universidad')
                                <th class="text-center">Carrera</th>
                            @endif
                            <th class="text-center">Grado</th>
                            <th class="text-center">Promedio</th>
                            @if($type == 'Primaria' || $type == 'Secundaria')
                                <th class="text-center">Calificación Examen</th>
                            @else
                                <th class="text-center">Taller</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td class="text-left">
                                    <a href="{{ route('users.show', $student->id) }}">{{ $student->name }}</a>
                                </td>
                                <td class="text-center">
                                @if (preg_match('/\invalido\b/',$student->email))
                                    N/A
                                @else
                                    {{ $student->email }}
                                @endif
                                </td>
                                <td class="text-center">{{ $student->age }}</td>
                                <td class="text-center">{{ $student->cellphone }}</td>
                                <td class="text-center">{{ $student->address }}</td>
                                @if($type == 'Preparatoria' || $type == 'Universidad')
                                    <td class="text-center">{{ $student->career }}</td>
                                @endif
                                <td class="text-center">{{ $student->level }}</td>
                                <td class="text-center">{{ $student->average }}</td>
                                @if($type == 'Primaria' || $type == 'Secundaria')
                                    <td class="text-center">{{ $student->score }}</td>
                                @else
                                    <td class="text-center">
                                    @if(count($student->course)>0)
                                        @foreach($student->course as $course)
                                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                                        @endforeach
                                    @else
                                        Sin Propuesta de Taller
                                    @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @else
                        <div class="alert alert-info">
                            Aún no hay becados de {{ $type }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('snippets.data-table-js', ['tablaId' => 'tbCandidates', 'opciones' => json_encode(['paging' => true, 'pageLength' => 50])])
@endsection
