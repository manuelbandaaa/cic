@extends('layouts.app')

@section('css')
    @include('snippets.select2-css')
@endsection 

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Nuevo Reporte</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(isset($report))
                    {!! Form::model($report, array('action' => array('ReportsController@update', $report->id), 'method' => 'patch', 'class' => 'form-horizontal')) !!}
                @else
                    {!! Form::open(['route' => 'reports.store', 'class' => 'form-horizontal']) !!}
                @endif
                <div class="form-group">
                    {!! Form::label('month', 'Mes del reporte', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('month', null, array('class' => 'form-control', 'required', 'placeholder' => 'Por ejemplo: Abril')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripción', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                         {!! Form::textarea('description', null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::hidden('user_id', \Auth::user()->id) !!}
                        {!! Form::submit('Aceptar', array('class' => 'btn btn-primary btn-sm')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection