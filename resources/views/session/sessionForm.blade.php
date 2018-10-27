@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Sesiones del Taller</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(isset($session))
                    {!! Form::model($session, ['route' => ['sessions.update', $session->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
                @else
                    {!! Form::open(['route' => 'sessions.store', 'class' => 'form-horizontal']) !!}
                @endif
                    <div class="form-group">
                        {!! Form::label('title', 'Nombre de la sesión', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title', null, array('class' => 'form-control', 'required', 'placeholder' => 'Ejemplo: Introducción al pentagrama musical')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('date', 'Fecha de la sesión', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::date('date', null, array('class' => 'form-control', 'required', 'placeholder' => 'AAAA-MM-DD')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripción', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description', null, array('class' => 'form-control', 'required', 'placeholder' => 'Ejemplo: Se iniciará la sesión explicando lo que son las notas musicales...')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('materials', 'Materiales Necesarios', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('materials', null, array('class' => 'form-control', 'placeholder' => 'Ejemplo: 1 cuaderno y 1 pluma')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        @if(!isset($session))
                            {!! Form::hidden('planning_id', $planning_id) !!}
                        @endif
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit('Agregar Sesion', array('class' => 'btn btn-primary btn-sm')) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection