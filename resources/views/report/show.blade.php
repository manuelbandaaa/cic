@extends('layouts.app')

@section('breadcrumb')
    <li>Reportes Mensuales</li>
    <li class="active"><a href="{{ route('users.show', $report->user->id) }}"><strong>{{ $report->user->name }}</strong></a></li>

@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        @include('partials.formError')
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Reporte del mes de {{ $report->month }}</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <p class="text-justify"> {{ $report->description }} </p>
            </div>
        </div>
    </div>
</div>

@endsection