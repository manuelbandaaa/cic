@extends('layouts.app')

@section('css')
    @include('snippets.select2-css')
@endsection 

@section('breadcrumb')
    <li><a href="{{ route('users.index') }}"><strong>Usuarios</strong></a></li>
    @if(isset($user))
        <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
        <li>Editar</li>
    @else
        <li>Nuevo</li>
    @endif
@endsection

@section('actions')
@if(isset($user) && \Auth::user()->position()->first()->id == 1 && (($user->position_id !=3) || ($user->degree=='Primaria' || $user->degree=='Secundaria')))
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endif
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ isset($user) ? 'Editar' : 'Nuevo' }} Usuario</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @if(isset($user))
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
                @else
                    {!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal']) !!}
                @endif
                <div class="form-group">
                    {!! Form::label('name', 'Nombre', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', null, array('class' => 'form-control', 'required')) !!}
                    </div>
                </div>
                @if(isset($user))
                    @if($user->degree == 'Preparatoria' || $user->degree == 'Universidad')
                        <div class="form-group">
                            {!! Form::label('email', 'Correo', array('class' => 'col-sm-2 control-label')) !!}
                            <div class="col-sm-10">
                                @if(\Auth::user()->position_id == 1)
                                {!! Form::email('email', null, array('class' => 'form-control')) !!}
                                @else
                                    {!! Form::email('email', null, array('class' => 'form-control', 'disabled')) !!}
                                    {!! Form::hidden('email', $user->email, array('class' => 'form-control')) !!}
                                @endif
                            </div>
                        </div>
                    @else
                        {!! Form::hidden('email', $user->email, array('class' => 'form-control')) !!}
                    @endif
                @else
                    <div class="form-group">
                        {!! Form::label('email', 'Correo', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            @if(\Auth::user()->position_id == 1)
                            {!! Form::email('email', null, array('class' => 'form-control')) !!}
                            @else
                                {!! Form::email('email', null, array('class' => 'form-control', 'disabled')) !!}
                            @endif
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('age', 'Edad', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('age', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('cellphone', 'Teléfono', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('cellphone', null, array('class' => 'form-control','maxlength' => 10)) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Domicilio', array('class' => 'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('address', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                @if(isset($user) && $user->position_id > 2 && ($user->degree == 'Preparatoria' || $user->degree == 'Universidad') && \Auth::user()->position_id == 1)
                    <div class="form-group">
                        {!! Form::label('career', 'Carrera', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('career', null, array('class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('level', 'Grado', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('level', null, array('class' => 'form-control', 'required')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('py', 'Monto Beca', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('pay', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                @endif
                @if(isset($user) && $user->position_id > 2 && \Auth::user()->position_id == 1)
                    <div class="form-group">
                        {!! Form::label('degree', 'Escolaridad', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            @if($user->degree=="Preparatoria" || $user->degree=='Universidad')
                                {!! Form::select('degree', ['Preparatoria' => 'Preparatoria', 'Universidad' => 'Universidad'], null, ['class' => 'form-control', 'id' => 'positions']) !!}
                            @else
                            {!! Form::select('degree', ['Primaria' => 'Primaria', 'Secundaria' => 'Secundaria'], null, ['class' => 'form-control', 'id' => 'positions']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('average', 'Promedio', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('average', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                @endif
                @if(isset($user) && $user->degree!="Primaria" && $user->degree!="Secundaria")
                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password', ['class' => 'form-control', 'type' => 'password']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirmar Contraseña', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'type' => 'password']) !!}
                        </div>
                    </div>
                @endif
                @if(\Auth::user()->position()->first()->id == 1)
                    <div class="form-group">
                        {!! Form::label('position_id', 'Cargo', array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            @if(isset($user) && $user->position_id < 3)
                                {!! Form::select('position_id', $positions, $user->position()->first()->id, ['class' => 'form-control', 'id' => 'positions']) !!}
                            @elseif(isset($user) && $user->position_id > 2)
                                {!! Form::select('position_id', $positions, $user->position()->first()->id, ['class' => 'form-control', 'id' => 'positions', 'disabled' => true]) !!}
                            @else
                                {!! Form::select('position_id', $positions, null, ['class' => 'form-control', 'id' => 'positions']) !!}
                            @endif
                        </div>
                    </div>
                @endif
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

@if(isset($user) && \Auth::user()->position()->first()->id == 1)
@section('scripts')
    @include('snippets.select2-js', ['selectId' => 'positions', 'placeholder' => 'Seleccionar Cargo'])
@endsection
@endif
