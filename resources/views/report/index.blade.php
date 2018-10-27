@extends('layouts.app')

@section('css')
    @include('snippets.data-table-css')
    @include('snippets.select2-css')
@stop

@section('actions')
    @if($user->id == \Auth::user()->id)
        <div class="row">
            <div class="col-md-12">
                <a href="{{ action('ReportsController@create') }}" class="btn btn-primary">Agregar reporte</a>
            </div>
        </div>
    @endif
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Reportes Mensuales de {{ $user->name }}</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if( count($user->reports) > 0 )
                    <table class="table table-striped table-bordered table-hover" id="tbCandidates">
                        <thead>
                            <tr>
                            <th class="text-center">Mes</th>
                            <th class="text-center">Fecha de creación</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->reports as $report)
                            <tr>
                                <td class="text-center"><a href="{{ route('reports.show', $report->id) }}" target="_blank">{{ $report->month }}</a></td>
                                <td class="text-center">{{ \Date::parse($report->created_at)->format('l j F Y H:i:s') }}</td>
                                <td class="text-center">
                                    <a href="{{ action('ReportsController@edit', $report->id) }}" class="btn btn-xs btn-outline btn-warning">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    {{ Form::open(array('method' => 'Delete', 'route' => array('reports.destroy', $report->id), 'class' => 'delete-form')) }}
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
                            No se han capturado reportes
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
