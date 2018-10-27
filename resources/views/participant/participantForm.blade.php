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
                <h5>Nuevo Participante</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(isset($participant))
                    {!! Form::model($participant, array('action' => array('ParticipantsController@update', $participant->id), 'method' => 'patch', 'class' => 'form-horizontal')) !!}
                @else
                    {!! Form::open(['route' => 'participants.store', 'class' => 'form-horizontal']) !!}
                @endif
                <div class="form-group">
                    {!! Form::label('name', 'Nombre', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('age', 'Edad', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('age', null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Domicilio', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('address', null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('cellphone', 'Teléfono', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                         {!! Form::text('cellphone', null, array('class' => 'form-control','maxlength' => 10)) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::hidden('course_id', \Auth::user()->course()->first()->id) !!}
                        {!! Form::submit('Aceptar', array('class' => 'btn btn-primary btn-sm')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection