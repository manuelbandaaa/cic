
@extends('layouts.app')

@section('css')
<style>
	/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de Asistencia</h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
            	{!! Form::open(['action' => 'AttendanceController@store', 'class' => 'form-horizontal']) !!}
	            	<div class="form-group">
	                    {!! Form::label('date', 'Fecha de la sesión', array('class' => 'col-sm-2 control-label')) !!}
	                    <div class="col-sm-10">
	                        {!! Form::date('date', null, array('class' => 'form-control', 'required')) !!}
	                    </div>
	                </div>
	                <br>
	                <h3>Selecciona solo las personas que asistieron a la clase</h3><br><br>
	            	@foreach($participants as $participant)
	            		<label class="container">{{ $participant->name }}
	            			{!! Form::checkbox($participant->id, 1) !!}
						  <span class="checkmark"></span>
						</label>
						<hr>
	            	@endforeach
	            	<div class="form-group">
	                    <div class="col-sm-10">
	                        {!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!}
	                    </div>
	                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection