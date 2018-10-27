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
                <h5>Listado de Avisos</h5>
                <div class="ibox-tools">
                    <a href="{{ action('AnnouncementsController@create') }}" class="btn btn-primary btn-sm">Nuevo Aviso</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if( count($announcements) > 0 )
                    <table class="table table-striped table-bordered table-hover" id="tbAnnouncements">
                        <thead>
                            <tr>
                            <th class="text-center">Título</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($announcements as $announcement)
                            <tr>
                                <td class="text-center"><a href="{{ route('announcements.show', $announcement->id) }}" target="_blank">{{ $announcement->title }}</a></td>
                                <td class="text-center">{{ \Date::parse($announcement->created_at)->format('l j F Y H:i:s') }}</td>
                                <td class="text-center">
                                    <a href="{{ action('AnnouncementsController@edit', $announcement->id) }}" class="btn btn-xs btn-outline btn-warning">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    {{ Form::open(array('method' => 'Delete', 'route' => array('announcements.destroy', $announcement->id), 'class' => 'delete-form')) }}
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
                            No se ha creado ningún aviso
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
