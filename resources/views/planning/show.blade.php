@extends('layouts.app')

@section('actions')
@if(\Auth::user()->position_id != 3 and \Auth::user()->position_id != 4 and $planning->finished and
$planning->user->position_id == 4)
    <div class="row">
        <div class="col-md-12">
            <div style="float: right; width: 130px"> 
                {!! Form::open(['route' => 'courses.store']) !!}
                {!! Form::hidden('planning_id', $planning->id) !!}
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check" aria-hidden="true"></i> Aceptar Taller
                </button>
                {!! Form::close() !!}
            </div>
            <div style="float: right; width: 225px"> 
                @include('partials.modalRefuseCourse')
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalRefuseCourse"><i class="fa fa-ban" aria-hidden="true"></i> Rechazar Taller</button>
            </div>
        </div>
    </div>
@endif
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Propuesta del Taller</h5>
                <div class="ibox-tools">
                	@if((\Auth::user()->id == $planning->user_id and !$planning->finished) || (count(\Auth::user()->course)>0) and \Auth::user()->id == $planning->user_id)
                    	<a href="{{ action('PlanningController@edit', $planning->user_id) }}" class="btn btn-success btn-sm">Editar Propuesta</a>
                    @endif
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <h2> {{ $planning->course_name }} </h2><br/>
                <h5> Recuperacion de Antecedentes </h5>
                <p class="text-justify"> {{ $planning->background }} </p><br/>
                <h5> Identificación y Delimitacion del Problema </h5>
                <p class="text-justify"> {{ $planning->delimitation }} </p><br/>
                <h5> Solución Propuesta </h5>
                <p class="text-justify"> {{ $planning->solution }} </p><br/>
                <h5> Requerimientos </h5>
                <p class="text-justify"> {{ $planning->requerements }} </p><br/>
                <h5> Difusión </h5>
                <p class="text-justify"> {{ $planning->diffusion }} </p><br/>
                <h5> Evaluación </h5>
                <p class="text-justify"> {{ $planning->evaluation }} </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Sesiones del Taller</h5>
                <div class="ibox-tools">
                	@if((\Auth::user()->id == $planning->user_id and !$planning->finished) || (count(\Auth::user()->course)>0) and \Auth::user()->id == $planning->user_id)
                    	<a href="{{ action('SessionController@create', $planning->id) }}" class="btn btn-success btn-sm">Agregar Sesiones</a>
                    @endif
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(count($planning->sessions) > 0)
                    @foreach($planning->sessions as $session)
                        <h4> {{ $session->title }} </h4>
                        <h6> Fecha de la sesión: {{ \Date::parse($session->date)->format('l j F Y') }} </h6>
                        <p class="text-justify"> {{ $session->description }} </p>
                        <p class="text-justify"> <h5>Materiales Necesarios: </h5> {{ $session->materials }} </p>
                        @if((\Auth::user()->id == $planning->user_id and !$planning->finished) || (count(\Auth::user()->course)>0) and \Auth::user()->id == $planning->user_id)
                            <p> <a href="{{ route('sessions.edit', $session->id) }}">
                                ---->Editar Sesion </a>
                            </p>
                        @endif
                        <hr>
                    @endforeach
                @else
                    <p> No se ha registrado ninguna sesión</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection