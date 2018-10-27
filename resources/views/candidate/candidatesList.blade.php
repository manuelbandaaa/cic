@extends('layouts.app')

@section('css')
    @include('snippets.data-table-css')
    @include('snippets.select2-css')
    <style type="text/css">
        input { 
            text-align: center; 
        }
    </style>
@stop

@section('actions')
    @if(($type == 'Primaria' || $type == 'Secundaria') && \Auth::user()->position_id == 1)
        <div class="row">
            <div class="col-md-12">
                @include('partials.modalSelectWinners')
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSelectWinners">Seleccionar ganadores</button>
            </div>
        </div>
    @endif
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Listado de Aspirantes - {{ $type }}</h5>
                <div class="ibox-tools">
                    @if(\Auth::user()->position_id == 1)
                    <a href="{{ action('CandidatesController@create') }}" class="btn btn-primary btn-sm">Nuevo Aspirante</a>
                    @endif
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if( count($candidates) > 0 )
                    <table class="table table-striped table-bordered table-hover" id="tbCandidates">
                        <thead>
                            <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Edad</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Domicilio</th>
                            @if($type == 'Preparatoria' || $type == 'Universidad')
                                <th class="text-center">Carrera</th>
                            @endif
                            <th class="text-center">Grado</th>
                            <th class="text-center">Promedio</th>
                            @if($type == 'Primaria' || $type == 'Secundaria')
                                <th class="text-center">Calificación Examen</th>
                            @else
                                <th class="text-center">Propuesta de Taller</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($candidates as $candidate)
                            <tr>
                                <td class="text-left">
                                    <a href="{{ route('users.show', $candidate->id) }}">{{ $candidate->name }}</a>
                                </td>
                                <td class="text-center">
                                @if (preg_match('/\invalido\b/',$candidate->email))
                                    N/A
                                @else
                                    {{ $candidate->email }}
                                @endif
                                </td>
                                <td class="text-center">{{ $candidate->age }}</td>
                                <td class="text-center">{{ $candidate->cellphone }}</td>
                                <td class="text-center">{{ $candidate->address }}</td>
                                @if($type == 'Preparatoria' || $type == 'Universidad')
                                    <td class="text-center">{{ $candidate->career }}</td>
                                @endif
                                <td class="text-center">{{ $candidate->level }}</td>
                                <td class="text-center">{{ $candidate->average }}</td>
                                @if($type == 'Primaria' || $type == 'Secundaria')
                                    <td class="text-center">
                                        <input type="text" onchange="insertScore('{{ $candidate->id}}', this)" value=" {{ $candidate->score }}" id="score">
                                    </td>
                                @else
                                    <td class="text-center">
                                    @if(count($candidate->planning)>0)
                                        @foreach($candidate->planning as $planning)
                                            @if($planning->finished)
                                                <a href="{{ route('planning.show', $candidate->id) }}">{{ $planning->course_name }}</a>
                                            @else
                                                Propuesta en Edición
                                            @endif
                                        @endforeach
                                    @else
                                        Sin Propuesta de Taller
                                    @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @else
                        <div class="alert alert-info">
                            No se han capturado aspirantes de {{ $type }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('snippets.data-table-js', ['tablaId' => 'tbCandidates', 'opciones' => json_encode(['paging' => true, 'pageLength' => 50])])
    <script src="{!! asset('js/plugins/sweetAlert/sweetalert.min.js') !!}" type="text/javascript"></script>
    <script>
        $('#selectWinners').on('click', function (e) {
            if(Number(document.getElementById("numInput").value)>0){
                e.preventDefault();
                swal({
                  title: "¿Estás seguro?",
                  text: "Se seleccionarán los becados de acuerdo a los puntajes más altos",
                  icon: "warning",
                  buttons: true
                })
                .then((guardar) => {
                  if (guardar) {
                    document.getElementById("winnersForm").submit();
                  }
                });
            }else{
                swal({
                  title: "Error",
                  text: "No escribiste un número válido",
                  icon: "error",
                  buttons: true
                });
            }
        });

        function insertScore(id, selectObject){
            var value = selectObject.value; 
            $.ajax({
              url: '/api/insert-score',
              type: 'get',
              dataType: 'json',
              data: {
                        'id' : id,
                        'score' : value
                    },
              success: function(response){
                
              }
            });
        }

    </script>
@endsection
