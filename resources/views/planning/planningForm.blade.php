@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Propuesta de Taller</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(isset($planning))
                    {!! Form::model($planning, array('action' => array('PlanningController@update', $planning->id), 'method' => 'patch', 'class' => 'form-horizontal')) !!}
                @else
                    {!! Form::open(['route' => 'planning.store', 'class' => 'form-horizontal']) !!}
                @endif
                <div class="form-group">
                    {!! Form::label('course_name', 'Nombre del Taller', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('course_name', null, array('class' => 'form-control', 'required', 'placeholder' => 'Por ejemplo: Taller de Guitarra')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('background', 'Recuperación de Antecedentes', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('background', null, array('class' => 'form-control', 'placeholder' => 'Explica la situación y los problemas que sufre actualmente la comunidad')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('delimitation', 'Identificación y Delimitación del problema', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('delimitation', null, array('class' => 'form-control', 'placeholder' => '¿Que problema intentas resolver y cómo afecta a la comunidad?')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('solution', 'Solución Propuesta', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('solution', null, array('class' => 'form-control', 'placeholder' => '¿Cuál es tu propuesta de taller y cómo ayudaría a resolver o disminuir el problema descrito anteriormente?')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('requerements', 'Requerimientos', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('requerements', null, array('class' => 'form-control', 'placeholder' => '¿Qué materiales o recursos necesitas para impartir el taller y qué necesitarán llevar las personas que quieren asistir?')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('diffusion', 'Difusión', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('diffusion', null, array('class' => 'form-control', 'placeholder' => '¿Cómo darás a conocer tu taller a la comunidad?')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('evaluation', 'Evaluación', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('evaluation', null, array('class' => 'form-control', 'placeholder' => 'Explica qué tan factible puede ser el éxito de tú taller y por qué')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::hidden('user_id', $id) !!}
                        {!! Form::submit('Guardar Cambios', array('class' => 'btn btn-primary btn-sm')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection