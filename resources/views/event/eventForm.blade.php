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
                <h5>Nuevo Evento</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(isset($event))
                    {!! Form::model($event, array('action' => array('EventsController@update', $event->id), 'files'=>true, 'method' => 'patch', 'class' => 'form-horizontal')) !!}
                @else
                    {!! Form::open(['route' => 'events.store', 'files'=>true, 'class' => 'form-horizontal']) !!}
                @endif
                <div class="form-group">
                    {!! Form::label('title', 'Título', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('title', null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('img', 'Imagen de Portada', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::file('img', array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('text', 'Descripción', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                         {!! Form::textarea('description', null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('images', 'Subir más fotos', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                         <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Aceptar', array('class' => 'btn btn-primary btn-sm')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection