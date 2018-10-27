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
                <h5>Listado de Eventos</h5>
                <div class="ibox-tools">
                    <a href="{{ action('EventsController@create') }}" class="btn btn-primary btn-sm">Nuevo Evento</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if( count($events) > 0 )
                    <table class="table table-striped table-bordered table-hover" id="tbEvents">
                        <thead>
                            <tr>
                            <th class="text-center">Título</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td class="text-center"><a href="{{ route('events.show', $event->id) }}" target="_blank">{{ $event->title }}</a></td>
                                <td class="text-center">{{ \Date::parse($event->created_at)->format('l j F Y H:i:s') }}</td>
                                <td class="text-center">
                                    {{ Form::open(array('method' => 'Delete', 'route' => array('events.destroy', $event->id), 'class' => 'delete-form')) }}
                                        <button class="btn btn-xs btn-outline btn-danger"><i class="fa fa-trash"></i></button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @else
                        <div class="alert alert-info">
                            No se ha creado ningún evento
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('snippets.data-table-js', ['tablaId' => 'tbEvents', 'opciones' => json_encode(['paging' => true, 'pageLength' => 50])])
@endsection
