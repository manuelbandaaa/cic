@extends('layouts.app')

@section('actions')
    <div class="row">
        <div class="col-md-12">
            @if(!$planning->finished)
                {!! Form::open(['action' => ['PlanningController@sendPlanning', $planning->id, 1]]) !!}
                    <button type="submit" class="btn btn-primary" id="modalSendPlanning"><i class="fa fa-send" aria-hidden="true"></i> Enviar a revisión</button>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection

@section('content')

@if(isset($obs) && $obs!=null)
    <div class="alert alert-warning"> 
        <strong>Observaciones: {{ $obs->obs }} </strong> 
    </div> 
@endif

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
                {!! Form::open(['route' => 'sessions.store', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Nombre de la sesión', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title', null, array('class' => 'form-control', 'required', 'placeholder' => 'Ejemplo: Introducción al pentagrama musical')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('date', 'Fecha de la sesión', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::date('date', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripción', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Ejemplo: Se iniciará la sesión explicando lo que son las notas musicales...')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('materials', 'Materiales Necesarios', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('materials', null, array('class' => 'form-control', 'placeholder' => 'Ejemplo: 1 cuaderno y 1 pluma')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::hidden('planning_id', $planning->id) !!}
                            {!! Form::submit('Agregar Sesion', array('class' => 'btn btn-primary btn-sm')) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Sesiones Agregadas</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(count($planning->sessions) > 0)
                    @foreach($planning->sessions as $session)
                        <h4> {{ $session->title }} </h4>
                        <h6> {{ $session->date }} </h6>
                        <p> {{ $session->description }} </p>
                        <p> <h5>Materiales Necesarios: </h5> {{ $session->materials }} </p>
                        <p> <a href="{{ route('sessions.edit', $session->id) }}">
                            ---->Editar Sesion </a>
                        </p>
                        <hr>
                    @endforeach
                @else
                    <p> No se ha registrado ninguna sesión</p>
                @endif
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tú Propuesta</h5>
                <div class="ibox-tools">
                    <a href="{{ action('PlanningController@edit', $planning->user_id) }}" class="btn btn-success btn-sm">Editar Propuesta</a>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <h2> {{ $planning->course_name }} </h2><br/>
                <h5> Recuperacion de Antecedentes </h5>
                <p> {{ $planning->background }} </p><br/>
                <h5> Identificación y Delimitacion del Problema </h5>
                <p> {{ $planning->delimitation }} </p><br/>
                <h5> Solución Propuesta </h5>
                <p> {{ $planning->solution }} </p><br/>
                <h5> Requerimientos </h5>
                <p> {{ $planning->requerements }} </p><br/>
                <h5> Difusión </h5>
                <p> {{ $planning->diffusion }} </p><br/>
                <h5> Evaluación </h5>
                <p> {{ $planning->evaluation }} </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{!! asset('js/plugins/sweetAlert/sweetalert.min.js') !!}" type="text/javascript"></script>
    <script>
        $('#modalSendPlanning').on('click', function (e) {
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
              title: "¿Estás seguro?",
              text: "Ya no podrás realizar cambios a tu propuesta ni agregar o modificar sesiones",
              icon: "warning",
              buttons: true
            })
            .then((guardar) => {
              if (guardar) {
                form.submit();
              }
            });
        });
    </script>
@endsection