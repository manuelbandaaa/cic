@extends('layouts.app')

@section('css')
    @include('snippets.data-table-css')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Listas de Asistencia de {{ $user->name }}</h5>
                <div class="ibox-tools">
                    @if(\Auth::user()->position_id == 3 && $user->id == \Auth::user()->id &&
                    \Auth::user()->course()->first()->numParticipants>0)
                        <a href="{{ action('AttendanceController@create') }}" class="btn btn-primary btn-sm">Nueva Lista</a>
                    @endif
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if( count($attendance) > 0 )
                    <table class="table table-striped table-bordered table-hover" id="tbAnnouncements">
                        <thead>
                            <tr>
                            <th class="text-center">Fecha</th>
                            @if(count($attendance) > 0 && $attendance->first()->course->user->id == \Auth::user()->id)
                                <th class="text-center">Eliminar</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($attendance as $day)
                            <tr>
                                <td class="text-center"><a href="{{ route('attendance.show', $day->id) }}">{{\Date::parse($day->date)->format('l j F Y') }}</a></td>
                                <td class="text-center">
                                    @if(count($attendance) > 0 && $attendance->first()->course->user->id == \Auth::user()->id)
                                        {{ Form::open(array('method' => 'Delete', 'route' => array('attendance.destroy', $day->id), 'class' => 'delete-form')) }}
                                            <button class="btn btn-xs btn-outline btn-danger"><i class="fa fa-trash"></i></button>
                                        {{ Form::close() }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @else
                        <div class="alert alert-info">
                            No se ha creado ninguna lista de asistencia
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('snippets.data-table-js', ['tablaId' => 'tbAnnouncements', 'opciones' => json_encode(['paging' => true, 'pageLength' => 50])])
@endsection
