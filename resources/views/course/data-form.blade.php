@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Información del Taller</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                {!! Form::model($course, array('action' => array('CoursesController@updateInfo', $course->id), 'files'=>true, 'method' => 'PUT', 'class' => 'form-horizontal')) !!}
                <div class="form-group">
                    {!! Form::label('img', 'Imagen de Taller', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::file('img', array('class' => 'form-control')) !!}
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
                        {!! Form::submit('Guardar Cambios', array('class' => 'btn btn-primary btn-sm')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection