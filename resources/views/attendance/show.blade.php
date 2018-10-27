@extends('layouts.app')

@section('css')
    @include('snippets.data-table-css')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Personas que asistieron el día {{\Date::parse($day)->format('l j F Y') }}</h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    @if(count($participants) > 0)
                    <table class="table table-striped table-bordered" id="usuarios">
                        <thead>
                            <th class="text-center">Nombre</th>
                            @if(\Auth::user()->position_id < 3)
                                <th class="text-center">Edad</th>
                                <th class="text-center">Domicilio</th>
                                <th class="text-center">Teléfono</th>
                            @endif
                        </thead>
                        <tbody>
                            @foreach($participants as $participant)
                            <tr>
                                <td class="text-center">{{ $participant->name }}</td>
                                @if(\Auth::user()->position_id < 3)
                                    <td class="text-center">{{ $participant->age }}</td>
                                    <td class="text-center">{{ $participant->address }}</td>
                                    <td class="text-center">{{ $participant->cellphone}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @else
                        <div class="alert alert-info">
                            Ninguna persona asistió a esta sesión.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('snippets.data-table-js', ['tablaId' => 'tbAnnouncements', 'opciones' => json_encode(['paging' => true, 'pageLength' => 50])])
@endsection
